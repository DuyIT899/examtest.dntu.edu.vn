<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_Course';

    protected $primaryKey = 'CourseID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }

    public function TrinhDoDaoTao(){
        return $this->hasOne(TrinhDoDaoTao::class, 'TranningLevelID','TranningLevelID');
    }

    public function HeDaoTao(){
        return $this->hasOne(HeDaoTao::class, 'TranningSystemID', 'TranningSystemID');
    }

    public function BacDaoTao(){
        return $this->hasOne(BacDaoTao::class, 'TranningLevelID', 'TranningLevelID');
    }

    public function CongThuc(){
        return $this->hasOne(CongThuc::class, 'FormulaID', 'FormulaID');
    }

    public function Khungs(){
        return $this->hasMany(Khung::class, 'CourseID', 'CourseID');
    }

    // public function Nganhs(){
    //     return $this->belongsToMany(Nganh::class, 'CourseIndustry', 'CourseID', 'IndustryID');
    //     // function Mons(){
    //         // return $this->belongsToMany(Mon::class, 'vnk_ModulesGroupJoin', 'ModulesGroupID', 'ModulesID');
    //     // }
    // }
}
