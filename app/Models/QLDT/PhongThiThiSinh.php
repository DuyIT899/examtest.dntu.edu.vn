<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class PhongThiThiSinh extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_UserNoID';

    public static function boot()
    {
        parent::boot();
 
        static::addGlobalScope(function ($query) {
            $query->select(['UserID', 'ExamZoomID'])
                    ->groupBy(['UserID', 'ExamZoomID']);
        });
    }
}