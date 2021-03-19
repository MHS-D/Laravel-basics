<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id')->length(100);
            $table->integer('patient_id')->length(100);
            $table->integer('doctor_id')->length(100);
            $table->date('date')->nullable()->length(100);
            $table->string('is_accepted');
            $table->time('time')->nullable();
            $table->string('is_payed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
