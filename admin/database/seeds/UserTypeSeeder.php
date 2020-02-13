<?php

use App\Models\UserType;
use Illuminate\Database\Seeder;


class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            'name' => 'Super Admin'
        ];

        UserType::create($data);


    }
}
