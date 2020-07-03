<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
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

        $country = Country::get();
        return view('visaguide.addvisaguide', compact('country'));
    }
    public function visaguidegetdata(){

        $model = VisaGuide::select('visa_guides.id as visaid','countries.name as cname','visa_guides.local_time as vlocaltime','telephone_code','bank_time','embassy_address','exchange_rate','created_at')
            ->leftjoin('countries','country_id','countries.id' )
            ->get();
        return DataTables::of($model)

            ->addColumn('action', function(VisaGuide $action) {
                return
                    '<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">Action<span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
					<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, -3px, 0px);">
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->visaid.' onclick="editvisaguidefunc(this)"><i class="fa fa-eye"></i> Edit</a>
                         <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->visaid.' onclick="deletevisaguidefunc(this)"><i class="fa fa-trash"></i> Delete</a>
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
        $visaguide->country_id = $r->countryid;
        $visaguide->local_time = $r->localtime;
        $visaguide->telephone_code = $r->tcode;
        $visaguide->bank_time = $r->banktime;
        $visaguide->embassy_address = $r->embassyaddress;
        $visaguide->exchange_rate = $r->exchangerate;
        $visaguide->visa_requirements = $r->visarequirements;
        $visaguide->status = $r->status;
        $visaguide->save();
        return back()->with('success', __('Visa Guide created successfully. :) '));

    }
    public function editvisaguide($id){
        $country = Country::get();
        $visaguide = VisaGuide::findOrFail($id)->first();

        return view('visaguide.editvisaguide', compact('visaguide', 'country'));

    }

    public function updatevisaguide(Request $r){

        $visaguide = VisaGuide::findOrFail($r->visaguideid);
        $visaguide->country_id = $r->countryid;
        $visaguide->local_time = $r->localtime;
        $visaguide->telephone_code = $r->tcode;
        $visaguide->bank_time = $r->banktime;
        $visaguide->embassy_address = $r->embassyaddress;
        $visaguide->exchange_rate = $r->exchangerate;
        $visaguide->visa_requirements = $r->visarequirements;
        $visaguide->status = $r->status;
        $visaguide->save();
        return back()->with('success', __('Visa Guide Updated successfully. :) '));


    }
    public function deletevisaguide($id){
        VisaGuide::findOrFail($id)->delete();
        return back()->with('success', __('Visa Guide Deleted successfully. :) '));
    }
}
