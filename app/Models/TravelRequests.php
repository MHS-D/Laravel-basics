<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelRequests extends Model
{
    use HasFactory;
    protected $table="travel_requests";
    public $timestamps=false;
}
