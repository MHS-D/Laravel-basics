<?php

namespace App\Http\Controllers;

use App\Models\AirlineTrips;
use App\Models\travel;
use App\Models\TravelRequests;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TravelController extends Controller
{
    //Cases Travel Requests view for arabic dr
    function case_view(){
         // select doctor cases
         $cases = DB::table('cases')->where('doctor_id',session('client_id'))->get(); // client_id is the id of logged ib doctor
         return view('hitos.travel.index',compact('cases'));
}

    // view travel request page
    function travel_view(){

        //============== Note: this must be set in auth controller not here ===================================
        $user = User::find(session(('client_id')));
        // get country name
        $country = DB::table('locations_countries')->where('id',$user->country_id)->value('name');
        // get state name
        $state = DB::table('locations_states')->where('id',$user->state_id)->value('name');
        // get city name
        $city = DB::table('locations_cities')->where('id',$user->city_id)->value('name');
        session(['address'=>$country.','.$state.','.$city]);
        //===============================================================================================

         // get the role of logged in user  if 2(doctor), 4(secretary), 3(patient), 5(city_admin), 6(airline office)
         $type = DB::table('rp_users_roles')->where('user_id',session('client_id'))->value('role_id');

         if($type == 2){

          // get all travel requests belongs to german doctor
          $requests = DB::table('travel_requests')->where('G_doctor_id',session('client_id'))->get();
        }

        if($type == 3){

            // get all travel requests belongs to patient
            $requests = DB::table('travel_requests')->where('patient_id',session('client_id'))->get();
          }

        if($type == 4){
            // get secertary medical center
            $medical_center_id = DB::table('medical_centers_staffs')->where('user_id',session('client_id'))->value('medical_center_id');
            // get requests according to secretary id
            $requests = DB::table('travel_requests')->where('medical_center_id',$medical_center_id)->get();
        }

         return view('hitos.travel.travel',compact('type','requests'));
    }

    // Getting Travel Request Form
    function travel_first_request($id){
        //get the case info
        $case = DB::table('cases')->where('id',$id)->first();
        // get all dr's for this case
        $doctors = DB::table('cases_doctors')->where('case_id',$id)
                                             ->where('doctor_id','!=',session('client_id'))->get();// for prevent getting logged in dr account

        return view('hitos.travel.request-form',compact('case','doctors'));
    }

    function send_request(Request $request){
        $request->validate([
            'reason' => "required",
            'doctor_id'=>"required",
        ]);

        TravelRequests::insert([
            'case_id'=>$request->case_id,
            'patient_id'=>$request->patient_id,
            'A_doctor_id'=>session('client_id'),
            'G_doctor_id'=>$request->doctor_id,
            'medical_center_id'=>$request->medical_id,
            'reason'=>$request->reason,
            'is_urgent'=>$request->urgent,
            'oxygen'=>$request->oxygen,
            'chair'=>$request->chair
        ]);

        return redirect()->route('case.view')->with('message','Request sent Successfuly');
    }

    // geting medical center for choosen dr (AJAX)
    function get_medical_center($id){
        // select medical center id of choosen dr
        $medicalCenter_id = DB::table('medical_centers_staffs')->where('user_id',$id)->pluck('medical_center_id');
        //select medical centers names and id;s
        $medicalCenter = DB::table('medical_centers')->whereIn('id',$medicalCenter_id)->get();

          // Fetch all records
     $userData['data'] = $medicalCenter;

     echo json_encode($userData);
     exit;

    }

    // Accept request method
    function request_accept($id){
        TravelRequests::where('id',$id)->update([
            'is_accepted' =>'1'
        ]);

        return redirect()->route('travel.view')->with('message',"Request Sent to secretary");

    }

    // deny request method
    function request_denied($id){
        TravelRequests::where('id',$id)->update([
            'is_accepted' =>'-1'
        ]);

        return redirect()->route('travel.view')->with('message',"request denied");

    }

    //set salary by secertary
    function set_salary(Request $request){

        $request->validate(['salary'=>'required|numeric']);

        TravelRequests::where('id',$request->id)->update([
            'payment_amount'=>$request->salary,
        ]);

        return redirect()->route('travel.view')->with('message',"Salary is set successfuly");
    }

    // view payment stripe page to specific request and amount
    public function checkout($id,$amount)
    {
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51IP5ilLntGb6Ni6L3rt5kZUC3B5fOOvRndyiZcG5sJWgoz1wWt4CqoKs3ddMYo8fhC28120mgG3VerdGkJXaCW2Y00mqPrckZo');

        $temp = $amount;
		$amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'usd',
			'description' => 'Payment From MHMD HS',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('hitos.travel.travel-payment',compact('intent'),['amount'=>$temp,'id'=>$id]);

    }

    // set paid to true
    public function afterPayment(Request $req)
    {
        TravelRequests::where('id',$req->id)->update(['payed'=>'1']);// 1 = true

        return redirect()->route('travel.view')->with('message', 'payment has been  Succesfully added');
    }

     // delete request
     function request_delete($id){
        TravelRequests::where('id',$id)->delete();

        return redirect()->route('case.view')->with('message',"request deleted");

    }

    // send travel request to airline office
    public function to_airline_office( $id)
    {
        //2 = request sent to airline office
        TravelRequests::where('id',$id)->update(['is_accepted'=>'2']);

        // get travel request data
        $data = TravelRequests::find($id);

        // get from and to country id
        $from_country_id = DB::table('users')->where('id',$data->patient_id)->value('country_id');
        $to_country_id = DB::table('medical_centers')->where('id',$data->medical_center_id)->value('country_id');

        // to fill the special need field in airline trips table
        $oxygen = $data->oxygen==1?'Oxygen':'';
        $chair  = $data->chair==1?'Chair':'';

        AirlineTrips::insert([
            'case_id'=>$data->case_id,
            'doctor_id'=>$data->G_doctor_id,
            'patient_id'=>$data->patient_id,
            'medical_center_id'=>$data->medical_center_id,
            'from_country_id'=>$from_country_id,
            'to_country_id'=>$to_country_id,
            'special_needs'=>$oxygen.'|'.$chair,
            'is_ready'=>'0'
        ]);

        return redirect()->route('travel.view')->with('message', 'sent to airline office');
    }

    // pdf bill download by patient
    function bill_download(){

    }
}
