<?php

namespace App\Http\Controllers;

use App\Enums\PackageStatus;
use App\Enums\PackageStep;
use App\Enums\PackageType;
use App\Http\Requests\PackageRequest;
use App\Models\Country;
use App\Models\Package;
use App\Models\PackageBookingRequest;
use App\Models\PackageTheme;
use App\Services\PackageServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
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

    public function getAllPackageLists(Request $request) {

        if ($request->has('city')) {
            $cityId = $request->get('city');
            $packageType = null;
        }
        if ($request->has('package-type')) {
            $packageType = $request->get('package-type');
            $cityId = null;
        }
        if (!$request->has('package-type') && !$request->has('city')) {
            $packageType = null; $cityId = null;
        }


        $allPackages = Package::where('status',PackageStatus::PUBLISHED);

        $allthemes = PackageTheme::all();
        $packageTypes = \App\Models\PackageType::all();

        $PackagesMeta = $allPackages->pluck('meta');

        $multiCountry = $PackagesMeta->map(function ($item, $key) {
            $a = json_decode($item);
            $ci = $a->address->country;
            return $ci;
        })->collapse();

        $allPackagedDuration = $PackagesMeta->map(function ($item, $key) {
            $a = json_decode($item);
            $ci = $a->duration_in_days;
            return $ci;
        });

        $allPackagedCountry = Country::select('countries.*')
            ->whereIn('countries.id',$multiCountry)
            ->distinct('countries.id')
            ->orderBy('countries.name', 'ASC')
            ->get();



        $package_budget = $request->get('package_budget');
        if (!blank($package_budget) && $package_budget !="") {

            $budget = explode(',',$package_budget);

            $allPackages = $allPackages->where(function ($query) use ($budget) {
                $query->where('budget', '>=', $budget[0])
                    ->Where('budget', '<=', $budget[1]);
            });
        }

        if (!blank($packageType)) {
            $package_types = $packageType;
        } else {
            $package_types = $request->get('package_types');
        }


        if (!blank($package_types) && $package_types !="") {

            $allPackages = $allPackages->where('package_type_id',$package_types);
        }

        $package_themes = $request->get('package_themes');
        $package_cities = $request->get('package_cities');
        $package_prices = $request->get('package_prices');
        $duration_filter = $request->get('duration_filter');


        if($request->ajax()){

            if (!blank($package_themes) && $package_themes !="") {

                $allPackages = $allPackages->whereJsonContains('theme_map', $package_themes);

            }

            if ($request->has('package_types')) {

                $package_types = $request->get('package_types');

            }

            if (!blank($package_types) && $package_types !="") {

                $allPackages = $allPackages->where('package_type_id',$package_types);

            }

            if (!blank($package_cities) && $package_cities !="") {

                $allPackages = $allPackages->whereJsonContains("meta->address->city",$package_cities);

            }
            if (!blank($duration_filter) && $duration_filter !="") {

                $allPackages = $allPackages->whereJsonContains('meta->duration_in_days', [$duration_filter]);


            }

            if (!blank($package_prices) && $package_prices !="") {

                $allPackages = $allPackages->where(function ($query) use ($package_prices) {
                    $query->where('budget', '>=', $package_prices[0])
                        ->Where('budget', '<=', $package_prices[1]);
                });
            }

        }

        $allPackages = $allPackages->latest()->paginate(10);

        if($request->ajax()){
            return view('package.package_lists', compact('allPackages'));
        }

        return view('package.lists', compact('allPackages','allthemes','allPackagedCountry',
            'packageTypes','package_types','package_budget','allPackagedDuration','cityId','packageType'));


    }

    public function saveBooking(Request $request) {

        if (Auth::check()) {

            $request = $request->all();
            $data = Arr::only($request,['offer_id','package_id','departure_date','travel_by','duration','meta']);
            $data['departure_date'] = Carbon::parse($data['departure_date'])->format("Y-m-d");
            $data['user_id'] = Auth::user()->id;
            $data['status'] = 0;

            $book = PackageBookingRequest::create($data);

            return redirect()->back()->with('success', 'Booking Request sent Successfully :)');

        } else {

            return redirect()->back()->with('warning', 'Please sign in before make a request');
        }
    }



}
