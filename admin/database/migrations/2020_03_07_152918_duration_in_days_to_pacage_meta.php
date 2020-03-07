<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DurationInDaysToPacageMeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {

             \App\Models\Package::all()->each(function ($p){

                $meta = data_get($p,'meta');

                if (!array_key_exists('duration_in_days',$meta)) {
                    $meta['duration_in_days'] = "";
                    $p->meta = $meta;
                    $p->save();
                }
            });

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

            \App\Models\Package::all()->each(function ($p){

                $meta = data_get($p,'meta');

                if (array_key_exists('duration_in_days',$meta)) {
                    unset($meta['duration_in_days']);
                    $p->meta = $meta;
                    $p->save();
                }
            });

        });
    }
}
