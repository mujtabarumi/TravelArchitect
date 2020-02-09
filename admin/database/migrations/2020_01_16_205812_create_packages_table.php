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
            $table->json('inclusion')->nullable();
            $table->json('exclusion')->nullable();
            $table->longText('additional_info')->nullable();
            $table->unsignedBigInteger('package_type_id');
            $table->unsignedBigInteger('city_id');
            $table->json('theme_map')->nullable();
            $table->string('duration')->nullable();
            $table->integer('budget')->nullable();
            $table->boolean('recommended')->default(0);
            $table->boolean('popular')->default(0);
            $table->boolean('air_price_included')->default(0);
            $table->date('departure_date')->nullable();
            $table->string('departure_from')->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_till')->nullable();
            $table->boolean('is_everyday_departs')->default(0);
            $table->tinyInteger('status')->default(\App\Enums\PackageStatus::DRAFT);
            $table->tinyInteger('steps')->default(\App\Enums\PackageStep::BASIC_INFORMATION);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
