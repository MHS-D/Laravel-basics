<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

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

                if($reset==1){
                  User::where('email', $email)
                  ->update(['resset' => '0']);
                  return view('passwords.pass2',['email'=>$email]);
                }
                if ($type == 'admin')
                return redirect('index');

                else if ($type == 'doctor')
                return redirect('doctor');

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
        $file->move(public_path('storage'),$filename);

        DB::table('users')->insert(
          [
              'Fname'=>$req->fname,
              'Lname'=>$req->lname,
              'Mname'=>$req->mname,
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
        public function doctor(){
          $drid = session('client_id');
          $dtasks=DB::table('tasks')->where('reciever_id',$drid)->get();
          
            return view('hitos.doctor',['dtasks'=>$dtasks]); 

        }
      

        public function tasks($id){
          $tasks=DB::table('tasks')->where('case_id',$id)->get();
          $did = session('client_id');
          $dtasks=DB::table('tasks')->where('reciever_id',$did)->get();
            return view('hitos.tasks',['tasks'=>$tasks,'dtasks'=>$dtasks]); 

        }
      
    }
