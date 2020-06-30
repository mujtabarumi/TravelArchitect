<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\PopularCity;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class PopularCityController extends Controller
{
    public function popularcity(){
        return view('popularcity.popularcity');
    }
    public function popularcityadd(){

        $country = Country::get();
        return view('popularcity.addpopularcity', compact('country'));
    }
    public function popularcitygetdata(){

        $model = PopularCity::select('popularcity.id as pcityId', 'popularcity.*','cities.*')
            ->leftjoin('cities','city_id','cities.id' )
            ->get();
        return DataTables::of($model)

            ->addColumn('action', function(PopularCity $action) {
                return
                    '<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">Action<span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
					<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, -3px, 0px);">
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->pcityId.' onclick="editpopularcity(this)"><i class="fa fa-eye"></i> Edit</a>
                         <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->pcityId.' onclick="deletepopularcity(this)"><i class="fa fa-trash"></i> Delete</a>
                      </div>
				</div>';
            })
            ->rawColumns(['action'])
            ->toJson();
    }
    public function popularcityview(){

    }

    public function popularcityinsert(Request $r){

        $popularcity = new PopularCity();
        $popularcity->city_id = $r->countryId;
        $popularcity->save();
       // $popularcity->imageLink =$r->imageLink;
        if($r->hasFile('imageLink')){
            $img = $r->file('imageLink');
            $filename= $popularcity->popularcityId.'popularcity'.'.'.$img->getClientOriginalExtension();
            $popularcity->imageLink=$filename;
            $location = public_path('popularcityImage/'.$filename);
            Image::make($img)->save($location);

        }
        $popularcity->save();
        return back()->with('success', __('Popularcity created successfully. :) '));

    }
    public function popularcityedit($id){


        $popularcity = PopularCity::findOrFail($id)->first();
        $city = City::where('id', $popularcity->city_id)->first();

        return view('popularcity.editpopularcity', compact('popularcity', 'city'));

    }

    public function popularcityupdate(Request $r){
        $popularcity = PopularCity::findOrFail($r->popularcityid);
        $popularcity->city_id = $r->countryId;
        if($r->hasFile('imageLink')){
            $img = $r->file('imageLink');
            $filename= $popularcity->popularcityId.'popularcity'.'.'.$img->getClientOriginalExtension();
            $popularcity->imageLink=$filename;
            $location = public_path('popularcityImage/'.$filename);
            Image::make($img)->save($location);

        }
        $popularcity->save();
        return back()->with('success', __('Popularcity Update successfully. :) '));
    }
}
