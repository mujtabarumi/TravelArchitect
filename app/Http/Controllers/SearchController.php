<?php

namespace App\Http\Controllers;

use App\Models\PeopleSearchFlight;
use App\Models\PeopleSearchPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    //

    public function insertsearchflights(Request $r){



        $flight = new PeopleSearchFlight();
        $flight->departure_from = $r->departure_city;
        $flight->departure_to = $r->destination_city;
        $flight->trip_type = $r->triptype;
        $flight->departure_date = Carbon::parse($r->departure_date)->format('Y-m-d');
        $flight->return_date = Carbon::parse($r->return_date)->format('Y-m-d');
        $flight->adult_travelers_count = $r->adult_count;
        $flight->child_travelers_count = $r->child_count;
        $flight->class_type = $r->classpicker;
        if (!empty(Auth::user()->id)) {
            $flight->user_id = Auth()->user('id');
        }
        $flight->name = $r->name;
        $flight->email = $r->email;
        $flight->mobile_number = $r->phone;
        $flight->save();
        return back();

    }

    public function insertsearchholiday(Request $r){

        $holiday = new PeopleSearchPackage();
        $holiday->departure_from = $r->pack_departure_city_from;
        $holiday->departure_to = $r->pack_destination_city_to;
        $holiday->duration = $r->holiday_duration;
        $holiday->departure_date = Carbon::parse($r->package_start)->format('Y-m-d');
        $holiday->theme_type = json_encode($r->package_type);
        $holiday->package_type_id ='1';
        $holiday->budget = $r->package_budget;
        if (!empty(Auth::user()->id)) {
            $holiday->user_id = Auth()->user('id');
        }
        $holiday->name = $r->name;
        $holiday->email = $r->email;
        $holiday->mobile_number = $r->phone;
        $holiday->save();
        return back();
    }

    public function insertsearchtours(Request $r) {


        $tour = new PeopleSearchPackage();
        $tour->departure_from = $r->pack_departure_city_from;
        $tour->departure_to = $r->pack_destination_city_to;
        $tour->duration = $r->holiday_duration;
        $tour->departure_date = Carbon::parse($r->package_start)->format('Y-m-d');
        $tour->theme_type = json_encode($r->package_type);
        $tour->package_type_id ='2';
        $tour->budget = $r->package_budget;
        if (!empty(Auth::user()->id)) {
            $tour->user_id = Auth()->user('id');
        }
        $tour->name = $r->name;
        $tour->email = $r->email;
        $tour->mobile_number = $r->phone;
        $tour->save();
        return back();
    }




}
