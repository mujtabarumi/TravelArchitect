<?php

namespace App\Http\Controllers;

use App\Model\Event;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index(){
        return view('event.eventList');
    }

    public function create(Request $data){
        $this->validate($data, [
            'eventTitle' => 'required',
            'eventStartDate' => 'required',
            'eventDate' => 'required',
            'eventTime' => 'required',
            'eventVenue' => 'required',
            'eventRegFee' => 'required',
            'eventStatus' => 'required',
            'eventDetails' => 'required'
        ]);

        $event = new Event();
        $event->eventTitle = $data->eventTitle;
        $event->eventStartdate = $data->eventStartDate;
        $event->eventDate = $data->eventDate;
        $event->eventTime = $data->eventTime;
        $event->eventVenue = $data->eventVenue;
        $event->eventRegFee = $data->eventRegFee;
        $event->eventStatus = $data->eventStatus;
        $event->eventdetails = $data->eventDetails;

        if ($event->save()){
            return response()->json([
                'message' => "Event added successfully."
            ]);
        }
    }

    public function all(Request $data){
        $model = Event::query();
        return DataTables::eloquent($model)
            ->orderColumn('eventId', '-eventId $1')
            ->addColumn('status', function(Event $status) {
                if($status->eventStatus == "active"){
                    return "<label class='btn btn-success btn-xs'>Active</label>";
                }elseif($status->eventStatus == "inactive"){
                    return "<label class='btn btn-danger btn-xs'>Inactive</label>";
                }
            })
            ->addColumn('created', function(Event $created) {
                return Carbon::parse($created->created_at)->format('H:i:s d-m-Y');
            })
            ->addColumn('action', function(Event $action) {
                return
                '<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">Action<span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
					<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, -3px, 0px);">
                        <a class="dropdown-item" href="javascript:void(0)" onclick="eventView('.$action->eventId.')"><i class="fa fa-eye"></i> View</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="eventEdit('.$action->eventId.')"><i class="fa fa-edit"></i> Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="eventDelete('.$action->eventId.')"><i class="fa fa-trash"></i> Delete</a>
                      </div>
				</div>';
            })
            ->rawColumns(['status','action'])
            ->toJson();
    }

}
