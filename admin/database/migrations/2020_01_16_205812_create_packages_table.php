<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->longText('details')->nullable();
            $table->longText('inclusion')->nullable();
            $table->longText('exclusion')->nullable();
            $table->longText('additional_info')->nullable();
            $table->unsignedBigInteger('package_type_id');
            $table->unsignedBigInteger('city_id');
            $table->string('theme_map')->nullable();
            $table->integer('duration')->nullable();
            $table->double('budget',7,2)->nullable();
            $table->tinyInteger('recommended')->default(0);
            $table->tinyInteger('popular')->default(0);
            $table->tinyInteger('air_price_included')->default(0);
            $table->date('departure_date')->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_till')->nullable();
            $table->tinyInteger('is_everyday_departs')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('package_type_id')->references('id')->on('package_types');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}