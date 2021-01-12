<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class database extends Controller
{
    function fromdb(){

        $data= User::paginate(7);
        return view('list',['usert'=>$data]);
    }

    function insert(Request $req){

        $user= new User;
        $user->username=$req->username;
        $user->password=$req->password;
        $user->number=$req->number;
        $user->save();
        return redirect('list');
    }

    function delete($id){

        $data= User::find($id);
        $data->delete();
        return redirect('list');
    }

    function showdata($id){

        $data= User::find($id);
        return view('updatelist',['data'=>$data]);
    }

    
    function updatedb(Request $req){

        $user= User::find($req->id); 
        $user->username=$req->username;
        $user->password=$req->password;
        $user->number=$req->number;
        $user->save();
        return redirect('list');
       }

       function listfromdb(){
          // return DB::table('users')->get();//show all data in db table named users 
            $data=DB::table('users')->get();
            return view('listQ',['data'=>$data]);
           //(you can put it in variable and return it to any view page)
       }

       function dbop(){
           
           //return DB::table('users')->get();//show all data in db table named users 
           // $data=DB::table('users')->get();
           //(you can put it in variable and return it to any view page)

               /*  return  DB::table('users')
                ->where('id',1)
                ->get();  */                                        // tre2a tnye

               // return (array)DB::table('users')->find(9); this step find any value with this id

               //return (array)DB::table('users')->count(); //this count all rows in table 

             /*   return DB::table('users')->insert(
                   [
                       'username'=>'mhs-d',
                       'password'=>'mohammad614',
                       'number'=>'71941273',

                   ]
                   ); */                                         // insert method

             /*   return DB::table('users')
               ->where('id',1)
               ->update(
                   [
                       'username'=>'ahmad',
                       'password'=>'ahmad614',
                       'number'=>'71941273',

                   ]
                   ); */                                           // update method

                   return DB::table('users')
                   ->where('id',1)->delete();
        }

        function operations(){

           // return DB::table('users')->avg('id'); give the average of the all ids

           //return DB::table('users')->sum('id'); give the sum of all ids

           //return DB::table('users')->count('id'); count the number of users in the table

           //return DB::table('users')->min('id'); give the min id (also used for strings)
           
           return DB::table('users')->max('id'); 

        }

        function join(){
            return DB::table('users')
            ->join('company','users.id',"=",'company.user_id')
            ->select('users.*') 
            ->get();
        }

        
        function accsessor(){
            return User::all();
          }

          function mutator()
          {
              $user = new User;
              $user ->username='hamody';
              $user ->password='anawadkazanova';
              $user ->number='71187805';
              $user->save();
          }

          function onetoOne()
          {
              return User::find(9)->getcompany;
          }

          function onetomany()
          {
              return User::find(4)->getcompany;
          }

          function binding(company $key){
            return $key;
        }


}
