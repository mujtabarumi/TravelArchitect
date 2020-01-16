<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appPath = base_path('database/seeds/sqls');
        $sqlFile = $appPath.'/states.sql';

        $engine = env('DB_CONNECTION','');
        $host = env('DB_HOST','');
        $port = env('DB_PORT','');
        $db = env('DB_DATABASE','');
        $user = env('DB_USERNAME','');
        $password = env('DB_PASSWORD','');

        if($engine == "mysql") {
            $command = "mysql -h ".$host." --port ".$port." -u ".$user." -p".$password." ".$db." < ".$sqlFile;
//            echo $command;
            exec($command);

        }
        else {
            echo "\033[01;31m You are not using mysql db! so state data seed not possible. \033[0m".PHP_EOL;
        }

    }
}
