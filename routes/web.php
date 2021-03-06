<?php

use App\Http\Controllers\about;
use App\Http\Controllers\api;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\database;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\forgotpassword;
use App\Http\Controllers\hitos_payment;
use App\Http\Controllers\Realtime;
use App\Http\Controllers\TravelController;
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
    Route::get('logout',[users::class,'logout'])->name('logout');

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





      //==========================Travel=========================================================

      Route::prefix('travel')->group(function () {

        //view travel main page for all users except arabic dr
        Route::get('',[TravelController::class,'travel_view'])->name('travel.view');
        //travel form for arabic doctor
        Route::get('case',[TravelController::class,'case_view'])->name('case.view');
        //travel request
        Route::get('request-form/{id}',[TravelController::class,'travel_first_request'])->name('travel.FirstRequest','id');
        Route::post('send-request',[TravelController::class,'send_request'])->name('travel.sendRequest');
        Route::get('getmedical_center/{id}',[TravelController::class,'get_medical_center']);
        // german doctor action
        Route::get('doctor_accept/{id}',[TravelController::class,'request_accept'])->name('travel.accept','id');
        Route::get('doctor_deny/{id}',[TravelController::class,'request_denied'])->name('travel.denied','id');
        // delete request
         Route::get('request-delete/{id}',[TravelController::class,'request_delete'])->name('travel.delete','id');
        // set salary by secertary
        Route::post('set-salary',[TravelController::class,'set_salary'])->name('travel.salary');
        // payment
        Route::get('payment/{id}/{amount}',[TravelController::class,'checkout'])->name('travel.payment.view','id','amount');
        Route::post('after-payment',[TravelController::class,'afterpayment'])->name('travel.credit-card');
        Route::post('after-payment',[TravelController::class,'afterpayment'])->name('travel.credit-card');
        // airline office
        Route::get('to-airline-office/{id}',[TravelController::class,'to_airline_office'])->name('travel.to.AirlineOffice','id');
        Route::get('travel-bill-download/{id}',[TravelController::class,'bill_download'])->name('travel.bill.download','id');


        Route::prefix('file')->group(function () {
             // Files needed form
            Route::get('-needed/{id}/{type}', [TravelController::class,'files_needed_form'])->name('travel.filesNeeded','id','type');
            Route::post('-needed-action', [TravelController::class,'files_needed_action'])->name('travel.filesNeeded.action');
             // delete airline file
             Route::get('-delete/{id}',[TravelController::class,'file_delete'])->name('travel.file.delete','id');
             // edit or show airline file
             Route::get('/{id}',[TravelController::class,'edit_show_files_info'])->name('travel.file.info','id');
             Route::post('-action',[TravelController::class,'edit_show_files_action'])->name('travel.file.action');
             // accept file by airline oofice
             Route::get('-accept/{id}',[TravelController::class,'file_accept'])->name('travel.file.accept','id');
             // send message by airline office about the files
             Route::post('-message',[TravelController::class,'file_message'])->name('travel.file.message');

        });
        // accept request by
        Route::post('Accept-request',[TravelController::class,'Accept_request'])->name('travel.request.accept');
        // Traveled patient
        Route::get('traveled/{id}',[TravelController::class,'traveled'])->name('travel.traveled','id');




    });

    //======================================Firebase notification========================
    Route::get('fcm',[FirebaseController::class,'index'])->name('firebase.index');


 });






 //--------------------------Pusher--------------------
 Route::view('test', 'pusher.add');
 Route::post('realtime',[Realtime::class,'notification']);
 //--------------------------------------------------------


































