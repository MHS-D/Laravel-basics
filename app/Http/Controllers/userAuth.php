<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userAuth extends Controller
{
        function userlogin(Request $req){

           $data=  $req->input();
           $req->session()->put('username',$data['username']);
           //echo session('username');
           return redirect('profile/en');

        }
        

}
