<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_ChiTiet extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_UserDetail';

    protected $primaryKey = 'UserID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }

    public function QuocGia(){
        return $this->hasOne(QuocGia::class, 'NationID', 'NationID');
    }

    public function TinhThanhPho(){
        return $this->hasOne(TinhThanhPho::class, 'ProvinceID', 'ProvinceID');
    }

    public function QuanHuyen(){
        return $this->hasOne(QuanHuyen::class, 'DistrictID', 'DistrictID');
    }

    public function PhuongXa(){
        return $this->hasOne(PhuongXa::class, 'DistrictSocialID', 'DistrictSocialID');
    }

    public function DanToc(){
        return $this->hasOne(DanToc::class, 'EthnicID', 'EthnicID');
    }

    public function TonGiao(){
        return $this->hasOne(TonGiao::class, 'ReligionID','ReligionID');
    }

    public function ThanhPhanGiaDinh(){
        return $this->hasOne(ThanhPhanGiaDinh::class, 'HomeComponentID', 'HomeComponentID');
    }

    public function MienTru(){
        return $this->hasOne(MienTru::class, 'ExemptionsID', 'ExemptionsID');
    }

    public function GioiTinh()
    {
        $gender = $this->Gender;
        if($gender == 1) $gioitinh = 'Nữ';
        if($gender == 0) $gioitinh = 'Nam';
        return $gioitinh;
    }

    public function DoiTuong(){
        return $this->hasOne(DoiTuong::class, 'ObjectID', 'Object');
    }
}
