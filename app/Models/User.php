<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
   // public $table="hindis"; //you put this when you r not naming the model as the table in db (users->user)
    public $timestamps=false;
    

    public function getusernameAttribute($value){
            return ucFirst($value);
    }
    public function getnumberAttribute($value){
            return $value.', Lebanon(+961)';
    }

   public function setusernameAttribute($value){
       $this->attributes['username']="Mr ".$value;
   }
   public function setnumberAttribute($value){
       $this->attributes['number']="+19".$value;
   }

   public function getcompany(){
        
   // return $this->hasOne('App\Models\company'); for one to one relation
    return $this->hasMany('App\Models\company'); //for one to mny relation
}

      
}
    