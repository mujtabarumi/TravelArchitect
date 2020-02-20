<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticeBoard extends Model
{
    //
    protected $table ='noticeboard';
    protected $primaryKey='noticeboardId';
    public $timestamps = false;
}
