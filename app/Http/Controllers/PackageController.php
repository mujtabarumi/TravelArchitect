<?php

namespace App\Http\Controllers;

use App\Enums\PackageStatus;
use App\Enums\PackageStep;
use App\Enums\PackageType;
use App\Http\Requests\PackageRequest;
use App\Models\Package;
use App\Services\PackageServices;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PackageController extends Controller
{
    private $packageService;
    const PackageType = [
        PackageType::HOLIDAY => 'Holiday',
        PackageType::TOUR => 'Tour',
    ];

    public function __construct(PackageServices $packageService)
    {
        $this->packageService = $packageService;
    }

    public function getPackageDetails(Package $package)
    {
        return view('package.details', compact('package'));
    }



}
