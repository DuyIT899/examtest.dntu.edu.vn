<?php

namespace App\Models\QLDT;

use App\Models\QLDT\User;

class TotNghiep extends User
{
    protected $connection = 'qldt';

    protected $table = 'GraduatedUser';

    protected $primaryKey = 'GraduatedUserID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }

    public function XetTotNghiep(){
        return $this->hasOne(XetTotNghiep::class, 'ID', 'GraduatedConsiderID');
    }


    // public function Khoa(){
    //     return $this->hasOne(Khoa::class, 'DepartmentID');
    // }

    // public function KhoaHoc(){
    //     return $this->hasOne(KhoaHoc::class, 'CourseID', 'CourseID');
    // }

    // public function KhoaHocChuyenNganh(){
    //     return $this->hasOne(KhoaHocChuyenNganh::class, 'CourseIndustryID', 'CourseIndustryID');
    // }

    // public function Lop(){
    //     return $this->hasOne(Lop::class, 'ClassCode', 'ClassCode');
    // }

    // Mã sinh viên
    // Ngày sinh
    // Nơi sinh
    // Giới tính
    // Ngành học
    // Chuyên ngành
    // Bậc đào tạo
    // Loại hình đào tạo
    // Điểm TBC

    // Khóa học: 2010 - 2012
    // Năm tốt nghiệp: 2012
    // Số hiệu văn bằng: 128095
    // Ngày cấp:
    // --Số QĐTN: 806
    // Số vào sổ: 845/806.09.2012

}
