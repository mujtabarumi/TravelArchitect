<?php

namespace App\Console\Commands;

use App\Models\Package;
use Illuminate\Console\Command;

class CheckPackageValidity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:validity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Package Expired and send notification if package expired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $package = Package::where('status', \App\Enums\PackageStatus::PUBLISHED)->get();

        foreach ($package as $p) {
            if (Carbon::now()->format('Y-m-d') > $p->valid_till->format('Y-m-d')) {
                DB::table('packages')
                    ->where('id', $p->id)
                    ->update(['status' => \App\Enums\PackageStatus::EXPIRED]);
            }
        }
    }
}
