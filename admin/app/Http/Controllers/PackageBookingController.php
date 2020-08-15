<?php

namespace App\Http\Controllers;

use App\Models\PackageBookingRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->id.' onclick="editBookingRequest(this)"><i class="fa fa-eye"></i> Edit</a>
                  
                      </div>
				</div>';
            })
            ->rawColumns(['action'])
            ->toJson();

    }

    public function editBookingData($id) {

        $bookingInfo = PackageBookingRequest::find($id);

        return view('package-booking.edit_booking', compact('bookingInfo'));
    }
    public function updateBookingData(Request $request) {

        $request = $request->all();
        $data = Arr::only($request,['offer_id','package_id','departure_date','travel_by','duration','meta','status','id']);

        $data['departure_date'] = Carbon::parse($data['departure_date'])->format("Y-m-d");

        $bookRequest = PackageBookingRequest::find($data['id']);

        $bookRequest->offer_id = $data['offer_id'];
        $bookRequest->package_id = $data['package_id'];
        $bookRequest->departure_date = $data['departure_date'];
        $bookRequest->travel_by = $data['travel_by'];
        $bookRequest->duration = $data['duration'];
        $bookRequest->meta = $data['meta'];
        $bookRequest->status = $data['status'];

        $bookRequest->save();


        return redirect()->route('package.booking.request')->with('success', 'Booking Request Updated Successfully :)');

    }
}
