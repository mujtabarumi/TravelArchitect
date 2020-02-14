<?php

namespace App\Http\Controllers;

use App\Enums\PackageStatus;
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


        $popularHolidays = Package::where('popular',1)->where('status',PackageStatus::PUBLISHED)->take(15)->get();
        $recommendedHolidays = Package::where('recommended',1)->where('status',PackageStatus::PUBLISHED)->take(12)->get();

        $packageThemes = PackageTheme::all();

        return view('layout.view',compact('popularHolidays','recommendedHolidays','packageThemes'));
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
