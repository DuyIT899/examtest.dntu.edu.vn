<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class KeHoachThiPhongThiThiSinh extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_UserNoID';

  
    // public static function boot()
    // {
    //     parent::boot();
 
    //     static::addGlobalScope(function ($query) {
    //         $query->select(['ExamPlanTimeID', 'ExamZoomID', 'UserID', 'NoID'])
    //                 ->groupBy(['ExamPlanTimeID', 'ExamZoomID', 'UserID', 'NoID']);
    //     });
    // }
}