<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\PackageTheme;
use App\Services\AddressService;
use App\Services\PackageServices;
use Illuminate\Http\Request;

class GlobalSearchController extends Controller
{
    public function searchPackageType(Request $request)
    {
        $packageService = app(PackageServices::class);
        $keyword = $request->get('keyword');
        return response()->json($packageService->searchPackageType($keyword));
    }
    public function searchPackageTheme(Request $request)
    {
        $keyword = $request->get('keyword');
        $themes = PackageTheme::where('name','like',"%{$keyword}%")->orderBy('name', 'ASC')->get();
        return response()->json($themes);
    }

    public function searchCountry(Request $request){
        $addressService = app(AddressService::class);
        $keyword = $request->get('keyword');
        return response()->json($addressService->searchCountry($keyword));

    }

    public function searchCountryCode(Request $request){
        $keyword = $request->get('keyword');
        $keyword = preg_replace("/[^a-zA-Z0-9]/", "", $keyword);
        $country = Country::query();
        if (!blank($keyword)) {
            $country->where(function ($q) use ($keyword){
                $q->orWhere('sort_name','like',"%{$keyword}%");
                $q->orWhere('name','like',"%{$keyword}%");
                $q->orWhere('phone_code','like',"%{$keyword}%");
            });
        }

        $codes = $country->orderBy('sort_name', 'ASC')->get()->map(function ($cc){
            return [
                'text' => "({$cc->sort_name}) +{$cc->phone_code}",
                'value' => $cc->id
            ];
        });

        return response()->json($codes);
    }

    public function searchState(Request $request, $countryId){
        $addressService = app(AddressService::class);
        $keyword = $request->get('keyword');
        return response()->json($addressService->searchState($keyword, $countryId));

    }

    public function searchCity(Request $request, $countryId=null, $stateId=null){
        $addressService = app(AddressService::class);
        $keyword = $request->get('keyword');
        $data = $addressService->searchCity($keyword, $countryId, $stateId)->map(function ($city){
            return [
                'id' => $city->id,
                'name' => $city->name
            ];
        });
        return response()->json($data);

    }
}
