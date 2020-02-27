<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\VisaGuide;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VisaGuideController extends Controller
{
    //
    public function visaguide(){
        return view('visaguide.visaguide');
    }
    public function visaguideadd(){

        $city = City::get();
        return view('visaguide.addvisaguide', compact('city'));
    }
    public function visaguidegetdata(){

        $model = VisaGuide::select('visa_guides.id as visaid ','cities.name as cname','local_time','telephone_code','bank_time','embassy_address','exchange_rate','created_at')
            ->leftjoin('cities','city_id','cities.id' )
            ->get();
        return DataTables::of($model)

            ->addColumn('action', function(VisaGuide $action) {
                return
                    '<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">Action<span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
					<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, -3px, 0px);">
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->visaid.' onclick="editvisaguide(this)"><i class="fa fa-eye"></i> Edit</a>
                         <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->visaid.' onclick="deletevisaguide(this)"><i class="fa fa-trash"></i> Delete</a>
                      </div>
				</div>';
            })
            ->rawColumns(['action'])
            ->toJson();
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
    public function visaguideedit(){

    }
}
