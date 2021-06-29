<?php

namespace App\Http\Controllers;

use App\Models\AirlineTripFiles;
use App\Models\AirlineTrips;
use App\Models\travel;
use App\Models\TravelRequests;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use ParagonIE\Sodium\Compat;

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

         if($type == 2){// german dr

          // get all travel requests belongs to german doctor
          $requests = DB::table('travel_requests')->where('G_doctor_id',session('client_id'))->get();
          //get all airline trips for doctor cases
          $trips = AirlineTrips::where('doctor_id',session('client_id'))->get();
        }

        if($type == 3){// patient

            // get all travel requests belongs to patient
            $requests = DB::table('travel_requests')->where('patient_id',session('client_id'))->get();
           //get all airline trips for patient
            $trips = AirlineTrips::where('patient_id',session('client_id'))->get();
          //get all airline trip files for patient
            $files = AirlineTripFiles::where('patient_id',session('client_id'))->get();

            return view('hitos.travel.travel',compact('type','requests','trips','files'));

          }

        if($type == 4){// secretary

            // get secertary medical center
            $medical_center_id = DB::table('medical_centers_staffs')->where('user_id',session('client_id'))->value('medical_center_id');
            // get requests according to secretary id
            $requests = DB::table('travel_requests')->where('medical_center_id',$medical_center_id)->get();
           //get all airline trips for secertary medical center
            $trips = AirlineTrips::where('medical_center_id',$medical_center_id)->get();
        }

        if($type == 5){//arabic city admin

            // get info of the city admin
            $info = DB::table('users')->where('id',session('client_id'))->first();

             // get all airline trips for city admin according to its city
            if($info->country_id == 49){
                $trips = DB::table('airline_trips')->where('to_city_id',$info->city_id)->get();
            }
            else{
                $trips = DB::table('airline_trips')->where('from_city_id',$info->city_id)->get();
            }

            return view('hitos.travel.travel',compact('type','trips'));
        }

        if($type == 6){//airline office

            // get all airline trips
            $trips = DB::table('airline_trips')->get();
            // get all airline trips files
            $files = AirlineTripFiles::all();

            return view('hitos.travel.travel',compact('type','trips','files'));
        }

         return view('hitos.travel.travel',compact('type','requests','trips'));
    }

    // Getting Travel Request Form
    function travel_first_request($id){
        //get the case info
        $case = DB::table('cases')->where('id',$id)->first();
        // get all dr's for this case
        $doctors = DB::table('cases_doctors')->where('case_id',$id)
                                             ->where('doctor_id','!=',session('client_id'))->get();// for prevent getting logged in dr account

        return view('hitos.travel.forms.request-form',compact('case','doctors'));
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
            'chair'=>$request->chair,

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
       $trip_id= AirlineTrips::where('request_id',$id)->value('id');
        AirlineTripFiles::where('trip_id',$trip_id)->delete();
        AirlineTrips::where('request_id',$id)->delete();

        return back()->with('message',"request deleted");

    }

    // send travel request to airline office
    public function to_airline_office( $id)
    {
        //2 = request sent to airline office
        TravelRequests::where('id',$id)->update(['is_accepted'=>'2']);

        // get travel request data
        $data = TravelRequests::find($id);

        // get from and to country and city id
        $from_country_id = DB::table('users')->where('id',$data->patient_id)->value('country_id');
        $to_country_id = DB::table('medical_centers')->where('id',$data->medical_center_id)->value('country_id');
        $from_city = DB::table('users')->where('id',$data->patient_id)->value('city_id');
        $to_city = DB::table('medical_centers')->where('id', $data->medical_center_id)->value('city_id');


        // to fill the special need field in airline trips table
        $oxygen = $data->oxygen==1?'Oxygen':'';
        $chair  = $data->chair==1?'Chair':'';

        AirlineTrips::insert([
            'request_id'=>$data->id,
            'case_id'=>$data->case_id,
            'doctor_id'=>$data->G_doctor_id,
            'patient_id'=>$data->patient_id,
            'medical_center_id'=>$data->medical_center_id,
            'from_country_id'=>$from_country_id,
            'to_country_id'=>$to_country_id,
            'special_needs'=>$oxygen.'|'.$chair,
            'is_ready'=>'0',
            'from_city_id'=>$from_city,
            'to_city_id'=>$to_city,
        ]);

        return redirect()->route('travel.view')->with('message', 'sent to airline office');
    }

    // pdf bill download by patient
    function bill_download(){

    }

    // airline trip files needed form
    function files_needed_form($id,$type){ // trip id and type (child/parent)
        // get patient info
        $userInfo = DB::table('users')->where('id',session('client_id'))->first();

        return view('hitos.travel.forms.files',compact('type','id','userInfo'));
    }

    function files_needed_action(Request $req){
        $req->validate([
            'name'=>'required',
            'phone'=>'required|numeric',
            'passport'=>'required|image',
            'ministry_of_helath'=>'required|image',
            'visa'=>'required|image',
        ]);
        // passport image
        $image2 = $req->passport;
                $imageName2 = $image2->getClientOriginalName();
                $image2->move(public_path('images'), $imageName2);
        // ministry of health acceptance
        $image3 = $req->ministry_of_helath;
                $imageName3 =$image3->getClientOriginalName();
                $image3->move(public_path('images'), $imageName3);
        // visa image
        $image = $req->visa;
                $imageName =$image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);

             // check if the files row exists in  db
            $check=AirlineTripFiles::where('trip_id',$req->trip_id)->where('parent_id',null)->first();

        if ($req->type == 'parent') {

            if($check){ // if the parent already exists in db
                return redirect()->route('travel.view')->with('error','Files already saved You can edit it in files table');
            }
            AirlineTripFiles::insert([
                'trip_id'=>$req->trip_id,
                'patient_id'=>$req->patient_id,
                'name'=>$req->name,
                'phone'=>$req->phone,
                'passport'=>$imageName2,
                'ministry_of_health_acceptance'=>$imageName3,
                'visa'=>$imageName,
                'passengers'=>$req->passengers
            ]);
            return redirect()->route('travel.view')->with('message2','Added successfuly');
        }

        if ($req->type == 'child') {


            // if parent exists in db
            if($check){
                // number of passengers
                $num = $check->passengers;
                // get number of child rows
                $child=AirlineTripFiles::where('trip_id',$req->trip_id)->where('parent_id','!=',null)->get();

                if (count($child) == $num) {// compare with the number of passengers choosen in parent row
                    return redirect()->route('travel.view')->with('error','You cannot exceed the Number of passengers you set ');
                }

                AirlineTripFiles::insert([
                    'trip_id'=>$req->trip_id,
                    'patient_id'=>$req->patient_id,
                    'name'=>$req->name,
                    'phone'=>$req->phone,
                    'passport'=>$imageName2,
                    'ministry_of_health_acceptance'=>$imageName3,
                    'visa'=>$imageName,
                    'parent_id'=>$check->id
                ]);

                return redirect()->route('travel.view')->with('message2','Added successfuly');
            }
            else{
                return redirect()->route('travel.view')->with('error','You cannot add passenger info befor your main info is set! ');
            }

         }
    }

     // delete file
     function file_delete($id){// id of airline trip files row

        AirlineTripFiles::where('id',$id)->delete();

        return back()->with('message4'," deleted Successfuly");
    }

    function edit_show_files_info($id){
        // get airline trip files and data
        $data=AirlineTripFiles::find($id);

        return view('hitos.travel.forms.show-edit-file',compact('data'));
    }

    //edit files action
    function edit_show_files_action(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'phone'=>'required|numeric',
        ]);

        // passport image
        if (isset($req->passport)) {
            $image2 = $req->passport;
            $imageName2 = $image2->getClientOriginalName();
            $image2->move(public_path('images'), $imageName2);
        }
        else{
            $imageName2 = AirlineTripFiles::where('id',$req->id)->value('passport');
        }

        // ministry of health acceptance
        if (isset($req->ministry_of_helath)) {
            $image3 = $req->ministry_of_helath;
            $imageName3 =$image3->getClientOriginalName();
            $image3->move(public_path('images'), $imageName3);
        }
        else{
            $imageName3 = AirlineTripFiles::where('id',$req->id)->value('ministry_of_health_acceptance');
        }

        // visa image
        if (isset($req->visa)) {
            $image = $req->visa;
            $imageName =$image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        }
        else{
            $imageName = AirlineTripFiles::where('id',$req->id)->value('visa');
        }

            AirlineTripFiles::where('id',$req->id)->update([
                'name'=>$req->name,
                'phone'=>$req->phone,
                'passport'=>$imageName2,
                'ministry_of_health_acceptance'=>$imageName3,
                'visa'=>$imageName,
                'is_accepted'=>'0'    // remove the decline status if exsists (0= not accepted yet/ 1= accepted/ -1 = denied)
            ]);
            return redirect()->route('travel.view')->with('message4', 'updated successfuly');
        }

        // accept file by airline office
        function file_accept($id){

            AirlineTripFiles::where('id',$id)->update([
                'is_accepted'=>'1'
            ]);

            return redirect()->route('travel.view')->with('message4','Accepted');
        }

        // decline file request and send note to patient
        function file_message(Request $req){
            $req->validate([
                'message'=>'required'
            ]);

            AirlineTripFiles::where('id',$req->id)->update([
                'note'=>$req->message,
                'is_accepted'=>'-1', // decline
            ]);

            return redirect()->route('travel.view')->with('message4','message sent');
        }

        // accept request from airline office , then the patient is ready to travel
        function Accept_request(Request $req){
            $req->validate([
                'arrival_date'=>'date|required',
                'arrival_time'=>'required',
                'departure_date'=>'date|required',
                'departure_time'=>'required'
            ]);

            AirlineTrips::where('id',$req->trip_id)->update([
                'arrival_date'=>$req->arrival_date,
                'arrival_time'=>$req->arrival_time,
                'departure_date'=>$req->departure_date,
                'departure_time'=>$req->departure_time,
                'is_ready'=>'1'
            ]);

            TravelRequests::where('id',$req->request_id)->update(['is_accepted'=>'3']);// patient on his way

            return redirect()->route('travel.view')->with('message2','Accepted , Patient is ready to travel');
        }

        //traveled
        function traveled($id){
            AirlineTrips::where('id',$id)->update(['is_ready'=>'2']);

            return back()->with('message2','Set To traveled');
        }
    }




