<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

      
    }
