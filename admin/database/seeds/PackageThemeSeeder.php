<?php


use App\Models\PackageTheme;
use Illuminate\Database\Seeder;


class PackageThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = array(
            array('name'=> 'Honeymoon'),
            array('name' => 'Group'),
            array('name' => 'Beach'),
        );


        PackageTheme::insert($data);


    }
}
