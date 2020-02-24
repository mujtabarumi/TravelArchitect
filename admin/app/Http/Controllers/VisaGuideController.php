<?php

namespace App\Http\Controllers;

use App\Models\VisaGuide;
use Illuminate\Http\Request;

class VisaGuideController extends Controller
{
    //
    public function visaguide(){
        return view('visaguide.visaguide');
    }
    public function visaguideadd(){

        return view('visaguide.addvisaguide');
    }
    public function visaguidegetdata(){

    }
    public function visaguideview(){

    }

    public function visaguideinsert(Request $r){
        $visaguide = new VisaGuide();
        $visaguide->city_id = $r->cityid;
        $visaguide->local_time = $r->localtime;
        $visaguide->telephone_code = $r->tcode;
        $visaguide->bank_time = $r->banktime;
        $visaguide->embassy_address = $r->embassyaddress;
        $visaguide->exchange_rate = $r->exchangerate;
        $visaguide->visa_requirements = $r->visarequirements;
        $visaguide->save();
        return back()->with('success', __('Visa Guide created successfully. :) '));

    }
}
