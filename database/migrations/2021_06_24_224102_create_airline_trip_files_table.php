<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirlineTripFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airline_trip_files', function (Blueprint $table) {
            $table->id();
            $table->integer('trip_id');
            $table->integer('patient_id');
            $table->string('name');
            $table->integer('phone');
            $table->string('passport');
            $table->string('ministry_of_health_acceptance');
            $table->string('visa');
            $table->integer('parent_id')->nullable();
            $table->integer('is_accepted')->nullable();
            $table->string('note')->nullable()->length('500');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airline_trip_files');
    }
}
