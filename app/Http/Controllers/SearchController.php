<?php

namespace App\Http\Controllers;

use App\Models\PeopleSearchFlight;
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
        $flight->departure_date = $r->departure_date;
        $flight->return_date = $r->return_date;
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


}
