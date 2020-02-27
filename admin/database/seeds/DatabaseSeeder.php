<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //clean it up
        $this->truncateAllTables();

        $this->call(CountrySeeder::class);
        echo "Country seed complete.".PHP_EOL;

        $this->call(StateSeeder::class);
        echo "State seed complete.".PHP_EOL;

        $this->call(CitySeeder::class);
        echo "City seed complete.".PHP_EOL;

        $this->call(UserTypeSeeder::class);
        echo "User Type seed complete.".PHP_EOL;

        $this->call(UserSeeder::class);
        echo "User seed complete.".PHP_EOL;

        $this->call(PackageTypeSeeder::class);
        echo "package Type seed complete.".PHP_EOL;

        $this->call(PackageThemeSeeder::class);
        echo "package Type seed complete.".PHP_EOL;

    }
    private function truncateAllTables() {

        echo "Deleting old data....".PHP_EOL;
        /***
         * This code is MYSQL specific
         */
        DB::statement("SET foreign_key_checks=0");

        \App\Models\Country::truncate();
        \App\Models\State::truncate();
        \App\Models\City::truncate();
        \App\Models\UserType::truncate();
        \App\Models\User::truncate();
        \App\Models\PackageType::truncate();
        \App\Models\PackageTheme::truncate();

        DB::statement("SET foreign_key_checks=1");
        echo "Old data delete complete.".PHP_EOL;

    }
}
