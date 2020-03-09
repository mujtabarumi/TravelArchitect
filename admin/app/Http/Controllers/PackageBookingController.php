<?php

namespace App\Http\Controllers;

use App\Models\PackageBookingRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PackageBookingController extends Controller
{
    public function showBookingRequest() {

        return view('package-booking.booking_list');
    }

    public function showBookingData(Request $request) {

        $model = PackageBookingRequest::select('package_booking_request.*','users.name','users.email','users.mobile_number','packages.title','packages.id as packageId')
         ->leftJoin('users','users.id','package_booking_request.user_id')
         ->leftJoin('packages','packages.id','package_booking_request.package_id');

        return DataTables::of($model)

            ->addColumn('User-info', function($model) {
                return
                '
                        Name: '.$model->name.'<br>
                        Email:'.$model->email.'<br>
                        phone:'.$model->mobile_number.'


                ';
            })
            ->addColumn('Package-info', function($model) {
                return
                '

                        Package Title:'.$model->title.'

                ';
            })
            ->addColumn('action', function(PackageBookingRequest $action) {
                return
                    '<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">Action<span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
					<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, -3px, 0px);">
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->id.' onclick="editvisaguide(this)"><i class="fa fa-eye"></i> Edit</a>
                         <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->id.' onclick="deletevisaguide(this)"><i class="fa fa-trash"></i> Delete</a>
                      </div>
				</div>';
            })
            ->rawColumns(['action'])
            ->toJson();

    }
}
