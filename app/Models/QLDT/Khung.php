<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khung extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'CourseIndustry';

    protected $primaryKey = 'CourseIndustryID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }

    public function KhoaHoc(){
        return $this->hasOne(KhoaHoc::class, 'CourseID', 'CourseID');
    }

    public function Nganh(){
        return $this->hasOne(Nganh::class, 'IndustryID', 'IndustryID');
    }

    public function ChiNhanh(){
        return $this->hasOne(ChiNhanh::class, 'BranchID', 'BranchID');
    }

    // Danh sách những học kỳ có số tín chỉ >0
    public function HocKys(){
        return $this->belongsToMany(HocKy::class, 'CourseIndustrySemester', 'CourseIndustryID', 'SemesterID')
        ->where('Credits','<>',0)->distinct();
    }

    public function KhungHocKys(){
        return $this->hasMany(KhungHocKy::class, 'CourseIndustryID', 'CourseIndustryID');
    }

    public function ChuongTrinhs(){
        return $this->hasMany(ChuongTrinh::class, 'CourseIndustryID', 'CourseIndustryID');
    }

    public function ChiTiet(){
        return $this->hasOne(KhungChiTiet::class, 'CourseIndustryID', 'CourseIndustryID');
    }

    public function Lops(){
        return $this->hasMany(Lop::class, 'CourseIndustryID', 'CourseIndustryID');
    }

    public function orders(){
        return $this->hasManyThrough('Contact', 'Account', 'owner_id')->join('orders','contact.id','=','orders.contact_ID')->select('orders.*');
     }

    public function Mons(){
        return $this->hasManyThrough(
            ChuongTrinhMon::class,
            ChuongTrinh::class,
            'CourseIndustryID', // khóa ngoại của bảng trung gian
            'ProgramID', // khóa ngoại của bảng mà chúng ta muốn gọi tới
            'CourseIndustryID', //trường mà chúng ta muốn liên kết ở bảng đang sử dụng
            'ProgramID' // trường mà chúng ta muốn liên kết ở bảng trung gian.
        );
    }
}
