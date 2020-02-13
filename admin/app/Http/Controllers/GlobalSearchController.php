<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\PackageTheme;
use App\Models\PeopleSearchFlight;
use App\Models\PeopleSearchPackage;
use App\Models\State;
use App\Services\AddressService;
use App\Services\PackageServices;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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

    public function saveMetaData(Request $request) {

    $this->validate($request,[
        "name" => "required",
        "type" => "required"
    ]);

    $name = $request->get('name');
    $type = $request->get('type');
    $modelId = null;
    $text = null;
    $parentId = $request->get('parent_id');

    switch ($type) {

        case 'state':
            $country = Country::findOrFail($parentId);

            $model = State::firstOrCreate([ 'name' => $name, 'country_id' => $country->id]);

            if (!blank($model)) {
                $modelId = $model->id;
                $text = $model->name;
            }
            break;

        case 'city':
            $state = State::findOrFail($parentId);

            $model = City::firstOrCreate([ 'name' => $name, 'state_id' => $state->id]);

            if (!blank($model)) {
                $modelId = $model->id;
                $text = $model->name;
            }
            break;

    }

    return response()->json([
        "success" => true,
        "data" => [
            'text' => $text,
            'value' => $modelId
        ]
    ], 200);
}

        public function searchflight(){

            return view('search.flight');
        }
        public function searchflightgetdata(){

            $model = PeopleSearchFlight::select('people_search_flights.id as searchId','a.name as departurefrom','b.name as departureto', 'departure_from', 'departure_to', 'trip_type', 'departure_date', 'return_date', 'adult_travelers_count', 'child_travelers_count', 'class_type', 'user_id', 'people_search_flights.name as searchname', 'people_search_flights.email as searchemail', 'people_search_flights.mobile_number as searchmobile',  'people_search_flights.created_at as searchcreate_at' , 'users.name as username')
                ->leftjoin('users','user_id','users.id' )
                ->leftjoin('cities as a','departure_from','a.id' )
                ->leftjoin('cities as b','departure_to','b.id' )
                ->get();
            return DataTables::of($model)


                ->addColumn('name', function(PeopleSearchFlight $name) {
                //    return $name->searchname ?? $name->username;
                   if ($name->user_id == ""){
                       return $name->searchname;
                   }else{
                      return $name->username;
                   }
                })
                ->addColumn('action', function(PeopleSearchFlight $action) {
                    return
                        '<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">Action<span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
					<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, -3px, 0px);">
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->searchId.' onclick="searchflightView(this)"><i class="fa fa-eye"></i> View</a>
                         <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->searchId.' onclick="searchflightDelete(this)"><i class="fa fa-trash"></i> Delete</a>
                      </div>
				</div>';
                })
                ->rawColumns(['name','action'])
                ->toJson();
        }

        public function searchflightview(Request $r){
            $model = PeopleSearchFlight::select('people_search_flights.id as searchId', 'a.name as departurefrom','b.name as departureto','departure_from', 'departure_to', 'trip_type', 'departure_date', 'return_date', 'adult_travelers_count', 'child_travelers_count', 'class_type', 'user_id', 'people_search_flights.name as searchname', 'people_search_flights.email as searchemail', 'people_search_flights.mobile_number as searchmobile',  'people_search_flights.created_at as searchcreate_at' , 'users.name as username', 'users.email as useremail','users.mobile_number as usermobile')
                ->leftjoin('users','user_id','users.id' )
                ->leftjoin('cities as a','departure_from','a.id' )
                ->leftjoin('cities as b','departure_to','b.id' )
                ->where('people_search_flights.id', $r->id)
                ->first();

            return view('search.viewflight', compact('model'));
        }


    public function searchholiday(){

        return view('search.holiday');
    }
    public function searchholidaygetdata(){

        $model = PeopleSearchPackage::select('people_search_packages.id as searchId','a.name as departurefrom','b.name as departureto', 'departure_from', 'departure_to', 'departure_date','theme_type',  'budget','package_type_id', 'user_id', 'people_search_packages.name as searchname', 'people_search_packages.email as searchemail', 'people_search_packages.mobile_number as searchmobile',  'people_search_packages.created_at as searchcreate_at' , 'users.name as username')
            ->leftjoin('users','user_id','users.id' )
            ->leftjoin('cities as a','departure_from','a.id' )
            ->leftjoin('cities as b','departure_to','b.id' )
            ->where('package_type_id' , '1')
            ->get();
        return DataTables::of($model)


            ->addColumn('name', function(PeopleSearchPackage $name) {
                //    return $name->searchname ?? $name->username;
                if ($name->user_id == ""){
                    return $name->searchname;
                }else{
                    return $name->username;
                }
            })
            ->addColumn('action', function(PeopleSearchPackage $action) {
                return
                    '<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">Action<span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
					<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, -3px, 0px);">
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->searchId.' onclick="searchholidayView(this)"><i class="fa fa-eye"></i> View</a>
                         <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->searchId.' onclick="searchholidayDelete(this)"><i class="fa fa-trash"></i> Delete</a>
                      </div>
				</div>';
            })
            ->rawColumns(['name','action'])
            ->toJson();
    }

    public function searchholidayview(Request $r){
        $model = PeopleSearchPackage::select('people_search_packages.id as searchId','a.name as departurefrom','b.name as departureto', 'departure_from', 'departure_to', 'departure_date','theme_type','package_type_id','package_types.name as typeName',  'budget','package_type_id', 'user_id', 'people_search_packages.name as searchname', 'people_search_packages.email as searchemail', 'people_search_packages.mobile_number as searchmobile',  'people_search_packages.created_at as searchcreate_at' , 'users.name as username')
            ->leftjoin('users','user_id','users.id' )
            ->leftjoin('cities as a','departure_from','a.id' )
            ->leftjoin('cities as b','departure_to','b.id' )
            ->leftjoin('package_types','package_type_id','package_types.id' )
            ->where('people_search_packages.id', $r->id)
            ->first();

        return view('search.viewholiday', compact('model'));
    }


    public function searchtour(){

        return view('search.tour');
    }
    public function searchtourgetdata(){

        $model = PeopleSearchPackage::select('people_search_packages.id as searchId','a.name as departurefrom','b.name as departureto', 'departure_from', 'departure_to', 'departure_date','theme_type',  'budget','package_type_id', 'user_id', 'people_search_packages.name as searchname', 'people_search_packages.email as searchemail', 'people_search_packages.mobile_number as searchmobile',  'people_search_packages.created_at as searchcreate_at' , 'users.name as username')
            ->leftjoin('users','user_id','users.id' )
            ->leftjoin('cities as a','departure_from','a.id' )
            ->leftjoin('cities as b','departure_to','b.id' )
            ->where('package_type_id' , '2')
            ->get();
        return DataTables::of($model)


            ->addColumn('name', function(PeopleSearchPackage $name) {
                //    return $name->searchname ?? $name->username;
                if ($name->user_id == ""){
                    return $name->searchname;
                }else{
                    return $name->username;
                }
            })
            ->addColumn('action', function(PeopleSearchPackage $action) {
                return
                    '<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">Action<span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
					<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, -3px, 0px);">
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->searchId.' onclick="searchtourView(this)"><i class="fa fa-eye"></i> View</a>
                         <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->searchId.' onclick="searchtourDelete(this)"><i class="fa fa-trash"></i> Delete</a>
                      </div>
				</div>';
            })
            ->rawColumns(['name','action'])
            ->toJson();
    }

    public function searchtourview(Request $r){
        $model = PeopleSearchPackage::select('people_search_packages.id as searchId','a.name as departurefrom','b.name as departureto', 'departure_from', 'departure_to', 'departure_date','theme_type','package_type_id','package_types.name as typeName',  'budget','package_type_id', 'user_id', 'people_search_packages.name as searchname', 'people_search_packages.email as searchemail', 'people_search_packages.mobile_number as searchmobile',  'people_search_packages.created_at as searchcreate_at' , 'users.name as username')
            ->leftjoin('users','user_id','users.id' )
            ->leftjoin('cities as a','departure_from','a.id' )
            ->leftjoin('cities as b','departure_to','b.id' )
            ->leftjoin('package_types','package_type_id','package_types.id' )
            ->where('people_search_packages.id', $r->id)
            ->first();

        return view('search.viewtour', compact('model'));
    }
}
