<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleSearchPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_search_packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('departure_from');
            $table->unsignedBigInteger('departure_to');
            $table->date('departure_date')->nullable();
            $table->integer('duration')->nullable();
            $table->string('theme_type')->nullable();
            $table->unsignedBigInteger('package_type_id')->nullable();
            $table->double('budget',7,2)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('departure_from')->references('id')->on('cities');
            $table->foreign('departure_to')->references('id')->on('cities');
            $table->foreign('package_type_id')->references('id')->on('package_types');
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
        Schema::dropIfExists('people_search_packages');
    }
}
