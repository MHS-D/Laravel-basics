<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    public function index(){

        return view('hitos.firebase.firebase');
    }
}
