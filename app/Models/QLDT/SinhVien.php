<?php

namespace App\Models\QLDT;

use App\Models\QLDT\User;

class SinhVien extends User
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('UserType', 0);
        });
    }

    public function Khoa(){
        return $this->hasOne(Khoa::class, 'DepartmentID', 'DepartmentID');
    }

    public function Lop(){
        return $this->hasOne(Lop::class, 'ClassCode', 'ClassCode');
    }

    public function TotNghiep(){
        return $this->hasOne(TotNghiep::class, 'UserID', 'UserID');
    }

    public function scopeMasv($query, $masv)
    {
        return $query->where('Username', $masv);
    }

    public function scopeDangHoc($query)
    {
        return $query->where('StatusID', 0)
                    ->orWhere('StatusID', 1);
    }

    public function scopeDinhChi($query)
    {
        return $query->where('StatusID', 2);
    }

    public function scopeBaoLuu($query)
    {
        return $query->where('StatusID', 3);
    }

    public function scopeThoiHoc($query)
    {
        return $query->where('StatusID', 4);
    }

    public function scopeDaTotNghiep($query)
    {
        return $query->where('StatusID', 5);
    }

    public function TrangThai()
    {
        $StatusID = $this->StatusID;
        if($StatusID == 0) return 'Đang học';
        if($StatusID == 1) return 'Đang học';
        if($StatusID == 2) return 'Đình chỉ';
        if($StatusID == 3) return 'Bảo lưu';
        if($StatusID == 4) return 'Thôi học';
        if($StatusID == 5) return 'Đã tốt nghiệp';

        return;
    }

    // public function GiaoDichs(){
    //     return $this->hasMany(GiaoDich::class, 'UserID', 'UserID')
    //     ->orderBy('CreatedTime','DESC');
    // }

    public function LichSuGiaoDichs(){
        return $this->hasMany(LichSuGiaoDich::class, 'UserID', 'UserID')
        ->orderBy('CreatedTime','DESC');
    }

    // public function LichSuGiaoDichMotCuas(){
        // return $this->hasMany(LichSuGiaoDich::class, 'UserID', 'UserID')
        // // ->where('LogCharge.TypeID', 2)
        // ->orderBy('CreatedTime','DESC');
    // }

    public function ThanhToans(){
        return $this->hasMany(ThanhToan::class, 'UserID', 'UserID')
                ->orderBy('CreatedTime','DESC');
    }

    public function MonDiems(){
        return $this->hasMany(MonSinhVienDiem::class, 'UserID', 'UserID');
    }
}
