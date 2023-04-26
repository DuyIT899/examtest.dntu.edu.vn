<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Support\Facades\DB;

class SoBaoDanhPhongThis extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_UserNoID';

    protected $primaryKey = 'NoID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }

    // public function PhongThi($PhongThiID)
    // {
    //     // return '123';
    //     // return $query->where('ExamPlanTimeID','>',5);
    //     // return $query->SoBaoDanhPhongThi;
    //     // return $query->where('UserType', 0);
    // }
}
