<?php

namespace App\Models\QLDT;

use App\Models\QLDT\User;

class GiangVien extends User
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('UserType', '>' , 0);

        });
    }

    function DonVi(){
        return $this->hasOne(Khoa::class, 'DepartmentID','DepartmentID');
    }


    function BoMons(){
        return $this->belongsToMany(BoMon::class, 'vnk_ModulesGroupUser', 'UserID', 'ModulesGroupID');
    }

    function LopHocPhans(){
        return $this->belongsToMany(LopHocPhan::class, 'GiaoVienLopHoc', 'UserID', 'IndependentClassID');
    }

    public function scopeMagv($query, $masv)
    {
        return $query->where('Username', $masv);
    }
}
