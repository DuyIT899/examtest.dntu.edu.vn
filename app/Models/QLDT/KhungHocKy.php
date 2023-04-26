<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhungHocKy extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'CourseIndustrySemester';

    protected $primaryKey = 'CourseIndustrySemester';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);
            $query->orderBy('SemesterID', 'ASC');
            $query->orderBy('TypeID', 'ASC');
        });
    }

    public function HocKy(){
        return $this->hasOne(HocKy::class, 'SemesterID', 'SemesterID');
    }

    // TypeID == 0 ? Bắt Buộc : Tự chọn
    public function isBatBuoc()
    {
        if($this->TypeID == 0) return true;
        return false;
    }

    public function isTuChon()
    {
        if($this->TypeID == 1) return true;
        return false;
    }

    public function scopeSoTinChi_By_Khung_HocKy($query, $Khung_id, $HocKy_id)
    {
        return $query->where('CourseIndustryID', $Khung_id)
                        ->where('SemesterID', $HocKy_id)
                        ->sum('Credits');
    }

    // public function scopeBatBuoc($query)
    // {
    //     return $query->where('TypeID', 0);
    // }

    // public function scopeTuChon($query)
    // {
    //     return $query->where('TypeID', 1);
    // }
}
