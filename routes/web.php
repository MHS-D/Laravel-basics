<?php

use App\Http\Controllers\about;
use App\Http\Controllers\api;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\database;
use App\Http\Controllers\forgotpassword;
use App\Http\Controllers\hitos_payment;
use App\Http\Controllers\uploadfile;
use App\Http\Controllers\userAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\users;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use function GuzzleHttp\Promise\coroutine;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* $data ="hi from the other side";

 $data= Str::ucfirst($data);
$data= Str::ucfirst($data);
$data= Str::replaceFirst('Hi', 'Hello', $data);
$data= Str::camel($data);                     // one way

$data=Str::of($data)
-> ucfirst($data)
-> replaceFirst('Hi', 'Hello', $data)
-> camel($data);                                     //another way

echo $data; */



Route::get('hello/{anything}', function ($any) {
    echo $any;
    return view('hello',['anything'=>$any]);// this variable go with you to the hello page 
});
Route::get('/', function () {
    return view('welcome'); 
});
Route::get('/about', function () {
    // return view('about');
    
        return redirect('welcome');
});

Route::view('contact', 'contact');// see userlist
Route::view('osama','login' );

// call from controller
 Route::get("index/{name}",[users::class,'index']);


// Route::get('/user/{name}', function ($name) {
//     return view("users",['user'=>$name]);
// });

// Route::view('users', 'users');

 Route::get("user",[users::class,'loadview']);


//Route::view('login', 'login');
Route::post("in",[users::class,'login']);
Route::delete("in",[users::class,'login']);
Route::put("put",[users::class,'login']);


Route::view('about', 'about')->middleware('pageprot');
Route::view('noaccess', 'noaccess'); 

Route::group(['middleware' => ['protectedPages']], function () {
    Route::view('home', 'home'); 
});

Route::get("data",[users::class,'db']);
Route::get("dbget",[users::class,'getdata']);

Route::get("userlist",[users::class,'http']); //using the contact page


Route::get("dbget",[users::class,'getdata']);

Route::post("userlog",[userAuth::class,'userlogin']);

Route::view('profile', 'profile'); 

Route::get('logout', function () {

    if (session()->has('username')){
        session()->pull('username');
    }
    return view('login');
});

Route::get('login', function () {

    if (session()->has('username')){

        return redirect('profile');
    }
    return view('login');
});

Route::view('add', 'add'); 
Route::post("addmember",[users::class,'addmember']);

Route::view('upload', 'upload'); 
Route::post("upload",[uploadfile::class,'index']);

Route::get('/profile/{lang}', function ($lang) {
    App::setlocale($lang);
    return view('profile');
});

Route::get('list',[database::class,'fromdb']);

Route::post('insertdb',[database::class,'insert']);

Route::get('deletedb/{id}',[database::class,'delete']);

Route::get('edit/{id}',[database::class,'showdata']);

Route::post('/update',[database::class,'updatedb']);

Route::get('mhs', function () {
    return view('mhs');
});

Route::get('listQ',[database::class,'listfromdb']);

Route::get('dbqry',[database::class,'dbop']);

Route::get('dbqry2',[database::class,'operations']);

Route::get('join',[database::class,'join']);

Route::get('acc',[database::class,'accsessor']);

Route::get('mut',[database::class,'mutator']);

//Route::get('relation',[database::class,'onetoOne']); to unlock this go to User model (getcompony)

Route::get('relation2',[database::class,'onetomany']);

Route::get('bind/{key:username}',[database::class,'binding']);


               


//------------------add image-----------
Route::view('add-student', 'add-student');
Route::post('add-image',[uploadfile::class,'addimage']);

Route::get('students',[uploadfile::class,'viewImage']);

Route::get('edit-student/{id}',[uploadfile::class,'beforUpdate']);
Route::post('update-student',[uploadfile::class,'editImage'])->name('student.update');

Route::get('delete-student/{id}',[uploadfile::class,'deleteImage']);
//---------------------------------------------------------------


//---------------------------------hitos login------------------
    Route::view('loginP', 'hitos.hitosLogin');
    Route::post('hitos',[users::class,'hitosLog']);


 Route::group(['middleware' => 'protectedPages'], function () {

    Route::view('index', 'hitos.hitosHome');
    //---------------------------------hitos logout------------------
    Route::get('logout',[users::class,'logout']);

    // -----------------------------forget password ------------------------------
    Route::get('forget-password',[ForgotPasswordController::class, 'getEmail'] )->name('forget-password');
    Route::post('forget-password', [ForgotPasswordController::class, 'postEmail'])->name('forget-password');

    // -----------------------------resset password ------------------------------
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'getPassword']);
    Route::post('reset-password',  [ResetPasswordController::class, 'updatePassword']);

     // HITOS PROJECT//-------RESSET FOR SCHEDULER----------
     Route::view('pass', 'passwords.pass2');
     Route::post('/reset',[ResetPasswordController::class,'ressetpass2']);
     //-----------------------------------------------------------------------
    
     //---------------------------------hitos register------------------
     Route::view('Preg', 'hitos.patient-reg');  
     Route::post('patient-reg',[users::class,'Preg'] );

     Route::view('Dreg', 'hitos.doctor-reg');  
     Route::post('doctor-reg',[users::class,'Dreg'] );

     //---------------------------------hitos tasks (tasks and notifications)------------------
    Route::get('doctor', [users::class,'doctor']);  
    Route::get('tasks/{id}', [users::class,'tasks']);
    Route::get('task_complete/{id}', [users::class,'task_complete']);
    Route::post('is_complete', [users::class,'task_is_complete']);

    
     //---------------------------------Hitos website settings (name and logo)------------------
     Route::view('settings', 'hitos.site');  
     Route::post('name_logo', [users::class,'settings']);  
    
     //---------------------------------Hitos Meetings ------------------
     Route::get('meetings', [users::class,'meeting']);  
        Route::get('decline/{id}',[users::class,'meetDecline']);
        Route::post('meetAccept',[users::class,'meetAccept']);

        Route::get('patient', [users::class,'Patient_meet']);  
        Route::get('meetdelete/{id}',[users::class,'meetDelete']);

      //---------------------------------Hitos payment (stripe)------------------
      Route::get('checkout/{id}',[hitos_payment::class,'checkout']);
      Route::post('checkout',[hitos_payment::class,'afterpayment'])->name('checkout.credit-card');

      //---------------------------------Hitos messages------------------
      Route::get('contacts',[users::class,'contacts']);
      Route::get('messages/{id}',[users::class,'messages']);
      Route::post('send',[users::class,'send_message']);



 });































