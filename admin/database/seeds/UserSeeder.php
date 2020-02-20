<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Jhon Travel',
            'email' => 'travelAdmin@gmail.com',
            'password' => Hash::make('worldtour'),
            'type_id' => 1,
            'status' => 1,
        ];
        User::create($data);

    }
}
