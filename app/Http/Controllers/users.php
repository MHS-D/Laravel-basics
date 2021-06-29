<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\meetings;
use App\Models\messages;
use App\Models\task;
use App\Models\User;
use App\Models\website;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use ParagonIE\Sodium\Compat;

class users extends Controller
{
    public  function index($user){

            echo $user;

        echo "  hello from controller";
    }

    public  function loadview(){

        $data = ['msh','osama','ali','morse'];
        return view("users",['values'=>$data]);

      }

      public function login(Request $req){

        $req->validate([
            'username'=>'required | max :10',
            'password'=>'required | min : 5'
        ]);

        return $req->input();
      }



      public  function db(){

      return DB::select('select * from users ');
      }

      public  function getdata(){

        return User::all();
        }

      public  function http(){

          $collection= Http::get("https://reqres.in/api/users?page=1");
          return view('contact',['collection'=> $collection['data']]);

      }

      public  function addmember(Request $req){

        $data= $req->input('username');
        $req->session()->flash('user',$data);
        return redirect('add');
        }

      //-----------------------------HITOS PROJECT---------------------------

        public function hitosLog(Request $req){

          $req->validate([
              'email'=>'required|email ',
              'password'=>'required  '
          ]);
          $email = DB::table('users')->where('email', $req->email)->value('email');
          $id = DB::table('users')->where('email', $req->email)->value('id');
          $pass = DB::table('users')->where('email', $req->email)->value('password');
          $password=  Hash::check($req->password, $pass);


            if($email== $req->email and $password == true ){

              $req->session()->put('client', $email);
              $req->session()->put('client_id', $id);

              $reset = DB::table('users')->where('email', $req->email)->value('resset');
              $type = DB::table('users')->where('email', $req->email)->value('type');
              $role = DB::table('rp_users_roles')->where('user_id', $id)->value('role_id');


              $req->session()->put('role', $role);


                if($reset==1){
                  User::where('email', $email)
                  ->update(['resset' => '0']);
                  return view('passwords.pass2',['email'=>$email]);
                }
                if ($type == 'admin')
                return redirect('index');

                $country_code  = DB::table('users')->where('id',session('client_id'))->value('country_code');

                if ($role == '2' && $country_code != 49 )
                return redirect()->route('case.view');

                if ($role == '2' || $role == '3' || $role == '4' || $role == '5' || $role == '6'  )
                return redirect()->route('travel.view');

                if ($type == 'patient')
                return redirect('patient');

           }
           else {

            return redirect('loginP')->with('error', 'Oppes! You have entered invalid email or password');
           }

        }

        public function Preg(Request $req){

          $req->validate([
            'fname'=>'required ',
            'lname'=>'required ',
            'mname'=>'required ',
            'mobile'=>'required ',
            'country'=>'required ',
            'city'=>'required ',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        DB::table('users')->insert(
          [
            'Fname'=>$req->fname,
            'Lname'=>$req->lname,
              'Mname'=>$req->mname,
              'name'=>$req->fname." ".$req->lname." ".$req->mname,
              'mobile'=>$req->mobile,
              'country'=>$req->country,
              'city'=>$req->city,
              'email'=>$req->email,
              'password'=>Hash::make($req->password),
              'type'=>'patient',
              'resset'=>0,

          ]
          );
          return back()->with('message', 'Patient has been added Succesfully');

        }

        public function Dreg(Request $req){
            $req->validate([
            'fname'=>'required ',
            'lname'=>'required ',
            'mname'=>'required ',
            'mobile'=>'required ',
            'country'=>'required ',
            'city'=>'required ',
            'nationality'=>'required ',
            'major'=>'required ',
            'cert' => 'required|mimes:pdf,docx|max:10240',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
            $file = $req->cert;
            $filename = time().'.'.$file->extension();
            $file->move(public_path('storage'), $filename);

            DB::table('users')->insert(
                [
              'Fname'=>$req->fname,
              'Lname'=>$req->lname,
              'Mname'=>$req->mname,
              'name'=>$req->fname." ".$req->lname." ".$req->mname,
              'mobile'=>$req->mobile,
              'country'=>$req->country,
              'city'=>$req->city,
              'nationality'=>$req->nationality,
              'major'=>$req->major,
              'certificates'=>$filename,
              'email'=>$req->email,
              'password'=>Hash::make($req->password),
              'type'=>'doctor',
              'resset'=>0,

          ]
            );
            return back()->with('message', 'Doctor has been added Succesfully');
        }

        //----------------------- 1/4--------------------------------------------------
        public function doctor(){

          //----------------------- for doctor tasks notifications--------------------------------------------
          $drid = session('client_id');
          $dtasks=DB::table('tasks')->where('reciever_id',$drid)
                                    ->where('is_complete','no')
                                    ->get();
          // ------------------------------for parent tasks----------------------------------------------------
          $parent=DB::table('tasks')->where('reciever_id',$drid)
                                    ->where('type','parent')->get();
          // ------------------------------for doctor messages --------------------------------
          $messages=messages::where('rec_id',$drid)->where('seen',null)->orderBy('created_at','desc')->paginate(7);



            return view('hitos.doctor',compact('dtasks','parent','messages'));

        }


        public function tasks($id){

          $tasks=DB::table('tasks')->where('case_id',$id)->get();

            return view('hitos.tasks',['tasks'=>$tasks]);

        }

        function settings(Request $req){

          if (isset($req->logo)) {

              $req->validate([
            'logo' => 'required|',
            'title' => 'required|max:20'
        ]);
        $imageName = time().'.'.$req->logo->extension();
        $req->logo->move(public_path('images'),$imageName);
          }
          else{
              $req->validate([
              'title' => 'required|max:20'
          ]);
        $imageName=DB::table('website_settings')->value('logo');
          }
      $settings = website::find(1);
      $settings->title =$req->title;
      $settings->logo =$imageName;
      $settings->save();

      return redirect('index');

      }
      function meeting(){
        $did = session('client_id');

        $meetings=DB::table('meetings')->where('doctor_id',$did)->get();


        return view('hitos.meeting',['meetings'=>$meetings]);
      }

      function meetAccept(Request $req){

        $req->validate([
          'date' => 'required|date',
          'time' => 'required|'
      ]);

        meetings::where('id',$req->id)->update(['time'=>$req->time,'date'=>$req->date,'is_accepted'=>'yes']);
        return back()->with('message2', 'configrations has been updated Succesfully');
      }

      function meetDecline($id){
        meetings::where('id',$id)->update(['is_accepted'=>'no']);
        return back()->with('message', 'meet has been deleted Succesfully');
      }

      function Patient_meet(){
        $did = session('client_id');

        $meetings=DB::table('meetings')->where('patient_id',$did)->get();

        return view('hitos.Pmeet',['meetings'=>$meetings]);
      }

      function meetDelete($id){
        meetings::where('id',$id)->delete();
        return back()->with('message', 'meet has been deleted Succesfully');
      }
      public function logout()
      {
        session()->forget('client_id');
        return redirect('loginP');
      }

      public function task_complete($id)
      {
        $task = DB::table('tasks')->where('id',$id)->get();
        return view('hitos.task-check',['task'=>$task]);
      }
      public function task_is_complete(Request $req)
      {
        $req->validate([
          'complete' => 'required'
      ]);
        DB::table('tasks')->where('id',$req->id)->update(['is_complete'=>'yes','completed_date'=>Carbon::now()]);

        return redirect('doctor')->with('task_completed','The task has been completed thank you');

      }

      public function contacts()
      {
        $did = session('client_id');
        $contacts=contact::where('user_id',$did)->get();


          return view('hitos.contacts',['contacts'=>$contacts]);
      }

      public function contact_messages($id)
      {
          $contact = contact::where('id',$id)->get();
          $messages = messages::where('rec_id',$contact->user_id,'sen_id',$contact->contact_id)
                      ->orderBy('created_at','asc')
                      ->get();
          return view('hitos.messages',['messages'=>$messages]);
      }

      public function messages($id){

        $did = session('client_id');

        messages::where('rec_id',$did)->where('sen_id',$id )->where('seen',null)->update(['seen'=> Carbon::now()]);

        $messages_rec = messages::where('rec_id',$did)->where('sen_id',$id )
                   ->orderBy('created_at','asc')
                   ->get();

                   $messages_send = messages::where('rec_id',$id)->where('sen_id',$did )
                   ->orderBy('created_at','asc')
                   ->get();

              $messages= $messages_rec->merge($messages_send)->sortBy('created_at');

                   $name=User::where('id',$id)->value('name');
                   $last_message= DB::table('messages')->where('r ec_id',$did)
                                   ->where('sen_id',$id)->latest('created_at')->value('message');

 return view('hitos.messages',compact('messages','name','last_message','id','did'));

      }

      public function send_Message(Request $req)
      {
        $req->validate([
          'message' =>'required|min: 1'
        ]);

        messages::insert([
          'rec_id' => $req->send_to,
          'sen_id' => $req->me,
          'message'=>$req->message,
          'created_at'=>Carbon::now(),

        ]);

        return back();
      }
    }
