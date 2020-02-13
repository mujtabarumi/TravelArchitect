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
use Illuminate\Support\Facades\DB;


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

    public function getAllPackageLists(Request $request,$packageType = null) {

        $allPackages = Package::where('status',PackageStatus::PUBLISHED);

        $allthemes = PackageTheme::all();
        $packageTypes = \App\Models\PackageType::all();

        $allPackagedCountry = Country::select('countries.*')->leftJoin('states','states.country_id','countries.id')
            ->leftJoin('cities','cities.state_id','states.id')
            ->whereIn('cities.id',$allPackages->pluck('city_id'))->distinct('countries.id')->get();


        $package_budget = $request->get('package_budget');

        if (!blank($packageType)) {
            $package_types = $packageType;
        } else {
            $package_types = $request->get('package_types');
        }

        $package_themes = $request->get('package_themes');

        if (!blank($package_budget) && $package_budget !="") {

            $budget = explode(',',$package_budget);

            $allPackages = $allPackages->where(function ($query) use ($budget) {
                    $query->where('budget', '>=', $budget[0])
                        ->Where('budget', '<=', $budget[1]);
                });
        }
        if (!blank($package_types) && $package_types !="") {

            $allPackages = $allPackages->where('package_type_id',$package_types);
        }

        if($request->ajax()){
            if (!blank($package_themes) && $package_themes !="") {

                $allPackages = $allPackages->where('theme_map', 'like', '%'.$package_themes.'%')->get();

            }

            return $allPackages;
        }




        $allPackages = $allPackages->latest()->paginate(10)->appends($request->all());



        return view('package.lists', compact('allPackages','allthemes','allPackagedCountry',
            'packageTypes','package_types','package_budget'));



    }



}
