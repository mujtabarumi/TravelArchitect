<?php

namespace App\Http\Controllers;


use App\Model\Event;
use App\NoticeBoard;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Image;

class NoticeBoardController extends Controller
{
    //
    public function index(){
        return view('noticeboard.noticeboardlist');
    }

    public function insert(Request $r){

        $noticeboard = new NoticeBoard();
        $noticeboard->nbTitle = $r->nbtitle;
        $noticeboard->nbDetails = $r->nbDetails;
        $noticeboard->nbDate = $r->nbDate;
       // $noticeboard->nbImage = $r->nbImage;
       // $noticeboard->nbDocument = $r->nbDocument;
        $noticeboard->nbStatus = $r->noticeStatus;
        $noticeboard->created_at = Carbon::now();

        $noticeboard->save();
        if($r->hasFile('nbImage')){
            $img = $r->file('nbImage');
            $filename= $noticeboard->noticeboardId.'noticeImage'.'.'.$img->getClientOriginalExtension();
            $noticeboard->nbImage=$filename;
            $location = public_path('noticeBoardImage/'.$filename);
            Image::make($img)->save($location);

        }
        if($r->hasFile('nbDocument')){

            $img = $r->file('nbDocument');
            $filename= $noticeboard->noticeboardId.'nbDocument'.'.'.$img->getClientOriginalExtension();
            $noticeboard->nbDocument=$filename;
            $location2 = public_path('noticeDoc'.'/');
            $upload_success = $img->move($location2, $filename);
        }
        $noticeboard->save();
        toastr()->success('Event Added Successfully');
        return back();

    }

    public function getNBdata(){

        $model = NoticeBoard::select('noticeboardId', 'nbTitle', 'nbDate', 'nbStatus', 'updated_at')->get();
        return DataTables::of($model)
            ->addColumn('status', function(NoticeBoard $status) {
                if($status->nbStatus == "active"){
                    return "<label class='btn btn-success btn-xs'>Active</label>";
                }elseif($status->nbStatus == "inactive"){
                    return "<label class='btn btn-danger btn-xs'>Inactive</label>";
                }
            })
            ->addColumn('created', function(NoticeBoard $created) {
                return Carbon::parse($created->created_at)->format('H:i:s d-m-Y');
            })
            ->addColumn('action', function(NoticeBoard $action) {
                return
                    '<div class="btn-group">
					<button type="button" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">Action<span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
					<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, -3px, 0px);">
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->noticeboardId.' onclick="noticeboardView(this)"><i class="fa fa-eye"></i> View</a>
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->noticeboardId.' onclick="noticeboardEdit(this)"><i class="fa fa-edit"></i> Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)" data-panel-id='.$action->noticeboardId.' onclick="noticeboardDelete(this)"><i class="fa fa-trash"></i> Delete</a>
                      </div>
				</div>';
            })
            ->rawColumns(['status','action'])
            ->toJson();
    }


}
