<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PackageCityIdToMeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {

            if (Schema::hasColumn('packages','city_id')){

                $city = \App\Models\City::all()->each(function ($c){
                    if (!blank($c->city_id)) {

                        $meta = data_get($c,'meta');
                        $meta['address'] = [
                            'country' => [],
                            'city' => [
                                $c->city_id
                            ]
                        ];
                        $c->meta = $meta;
                        $c->save();
                    }
                });

                $table->dropForeign('packages_city_id_foreign');
                $table->dropColumn(['city_id']);
            }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {

            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
        });

        $city = \App\Models\City::all()->each(function ($c){

            $meta = data_get($c,'meta');
            $city_Id = data_get($meta,'address.city.0');

            if (data_get($meta,'address')) {
                unset($meta['address']);
                $c->meta = $meta;
            }

            $c->save();
        });
    }
}
