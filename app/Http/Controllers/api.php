<?php

namespace App\Http\Controllers;

use App\Models\hindi;
use Illuminate\Http\Request;

class api extends Controller
{
    function getdata()
    {
        return ["name"=>'hamoody','email'=>'hamoody@gmail.com'];
    }

    function list()
    {
        return hindi::all();
    }

    function add(Request $req)
    {
       $data= new hindi;
       $data->name=$req->name;
       $data->email=$req->email;
       $result= $data->save();

       if($result){
           return ["data saved"];
       }
       else {
             return ["result"=>'fail'];
       }
       

    }
}
