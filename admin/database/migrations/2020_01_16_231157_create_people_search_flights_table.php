<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleSearchFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_search_flights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('departure_from');
            $table->unsignedBigInteger('departure_to');
            $table->integer('trip_type');
            $table->date('departure_date')->nullable();
            $table->date('return_date')->nullable();
            $table->integer('adult_travelers_count')->nullable();
            $table->integer('child_travelers_count')->nullable();
            $table->integer('class_type')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number', 20)->nullable();
            $table->softDeletes();

            $table->foreign('departure_from')->references('id')->on('cities');
            $table->foreign('departure_to')->references('id')->on('cities');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people_search_flights');
    }
}