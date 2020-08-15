<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\VisaGuide;
use Illuminate\Http\Request;

class VisaGuideController extends Controller
{
    //
    public function index(){
        $country = Country::get();
        return view('visaguide.visaguide',compact('country'));
    }
    public function viewvisaguide(Request $r){

        $visaguide = VisaGuide::where('country_id', $r->id )->first();
        if (empty($visaguide)){
            return "<h1 style='color: red'>Sorry No Record Found</h1>";
        }else
        return view('visaguide.viewguide', compact('visaguide'));

    }
}
