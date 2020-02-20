<?php

use App\Models\PackageType;
use Illuminate\Database\Seeder;


class PackageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = array(
            array('name'=> 'Holiday'),
            array('name' => 'Tour'),
        );


        PackageType::insert($data);


    }
}
