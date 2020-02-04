<?php

namespace App\Http\Controllers;

use App\Enums\PackageStatus;
use App\Enums\PackageStep;
use App\Enums\PackageType;
use App\Http\Requests\PackageRequest;
use App\Models\Country;
use App\Models\Package;
use App\Models\PackageTheme;
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

    public function getAllPackageLists(Request $request) {

        $allPackages = Package::where('status',PackageStatus::PUBLISHED);

        $allthemes = PackageTheme::all();

        $allPackagedCountry = Country::select('countries.*')->leftJoin('states','states.country_id','countries.id')
            ->leftJoin('cities','cities.state_id','states.id')
            ->whereIn('cities.id',$allPackages->pluck('city_id'))->distinct('countries.id')->get();

       // dd($allPackagedCountry);

        $allPackages = $allPackages->latest()->paginate(10)->appends($request->all());

        return view('package.lists', compact('allPackages','allthemes','allPackagedCountry'));



    }



}
