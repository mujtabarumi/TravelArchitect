<?php

namespace App\Http\Controllers;

use App\Enums\PackageStatus;
use App\Enums\PackageType;
use App\Models\City;
use App\Models\Package;
use App\Models\PackageTheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    //
    public function index(){

//        $publishedPackaged = Package::where('status',PackageStatus::PUBLISHED)->get();

        $popularHolidays = Package::where('status',PackageStatus::PUBLISHED)->where('popular',1)->take(15)->get(); //not done

        $homeSlider = Package::where('status',PackageStatus::PUBLISHED)->where('home_slider',1)->get();

        $recommendedHolidays = Package::where('status',PackageStatus::PUBLISHED)->where('package_type_id',PackageType::HOLIDAY)->where('recommended',1)->take(12)->get();
        $recommendedTours = Package::where('status',PackageStatus::PUBLISHED)->where('package_type_id',PackageType::TOUR)->where('recommended',1)->take(12)->get();


        $packageThemes = PackageTheme::all();

        return view('layout.view',compact('popularHolidays','recommendedHolidays','packageThemes','recommendedTours','homeSlider'));
    }

    public function autocomplete(){
        //$term = Input::get('destination_city');
        $term = Input::get('term');;

        $results = array();

        $queries = DB::table('cities')
            ->where('name', 'LIKE', '%'.$term.'%')
            ->take(7)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->name ];
        }
        return response()->json($results);
    }
}