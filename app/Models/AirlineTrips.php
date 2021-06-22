<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirlineTrips extends Model
{
    use HasFactory;
    public $table="airline_trips";
    public $timestamps=false;
}
