<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('case_id');
            $table->integer('patient_id');
            $table->integer('A_doctor_id');
            $table->integer('G_doctor_id');
            $table->integer('medical_center_id');
            $table->integer('secretary_id')->nullable();
            $table->string('reason')->length(1000);
            $table->integer('is_urgent')->nullable();
            $table->integer('oxygen')->nullable();
            $table->integer('chair')->nullable();
            $table->integer('is_accepted')->nullable();
            $table->integer('payment_amount')->nullable();
            $table->integer('payed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travel');
    }
}
