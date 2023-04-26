<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

use App\Models\QLDT\SoBaoDanhPhongThis;

class KeHoachThi extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_ExamPlanTime';

    protected $primaryKey = 'ExamPlanTimeID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }

    public function LopHocPhan(){
        return $this->hasOne(LopHocPhan::class, 'IndependentClassID', 'IndependentClassID');
    }

    public function ThoiGianThi(){
        return $this->hasOne(ThoiGianThi::class, 'ExamTimeID', 'ExamTime');
    }

    public function SoBaoDanhPhongThis(){
        return $this->hasMany(SoBaoDanhPhongThis::class, 'ExamPlanTimeID', 'ExamPlanTimeID');
    }

    public function PhongThis()
    {
        return $this->belongsToMany(Phong::class, 'vnk_UserNoID', 'ExamPlanTimeID', 'ExamZoomID')->distinct();
    }
}

// [ExamPlanTimeID]
// [IndependentClassID]
// [ExamTime]
// [ApplicationID]
// [DateExam]
// [StatusID]
// [StudentCount]
// [CreatedTime]
// [TestID]
