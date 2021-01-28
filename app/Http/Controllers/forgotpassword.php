<?php

namespace App\Http\Controllers;

use App\Mail\testmail;
use App\Models\hindi;
use App\Models\User;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use function GuzzleHttp\Promise\all;


//------------------------not used yet------------------------------------------------------


class forgotpassword extends Controller
{
    public function forgot()
    {
        return view('forgot');
    }

    public function resset(Request $req){

        if( $req->password == $req->pass ){

            $username=session('client');
            DB::table('users')
              ->where('username', $username)
              ->update(['password' => $req->password]);
            
            return redirect('index');
         }
         else {

          $req->session()->flash('reset');
          
              return redirect('resset');
         } 
        
     
    }

    

}
