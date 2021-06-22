<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirlineTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airline_trips', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id');
            $table->integer('doctor_id');
            $table->integer('patient_id');
            $table->integer('medical_center_id');
            $table->integer('from_country_id');
            $table->integer('from_city_id')->nullable();
            $table->integer('to_country_id');
            $table->integer('to_city_id')->nullable();
            $table->string('special_needs')->nullable();
            $table->time('arrival_time')->nullable();
            $table->date('arrival_date')->nullable();
            $table->time('departure_time')->nullable();
            $table->date('departure_date')->nullable();
            $table->integer('number_of_passengers')->nullable();
            $table->integer('is_ready')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airline_trips');
    }
}
