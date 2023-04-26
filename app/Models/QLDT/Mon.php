<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mon extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_Modules';

    protected $primaryKey = 'ModulesID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('vnk_Modules.del', '=' , 0);

        });
    }

    public function Khoa(){
        return $this->hasOne(Khoa::class, 'DepartmentID', 'DepartmentID');
    }

    public function TrinhDoDaoTao(){
        return $this->hasOne(TrinhDoDaoTao::class, 'TranningLevelID', 'TranningLevelID');
    }

    public function LoaiHocPhan(){
        return $this->hasOne(LoaiHocPhan::class,'TypeID', 'ModulesTypeID');
    }

    public function HinhThucThi(){
        return $this->hasOne(HinhThucThi::class,'ExamTypeID', 'ExamTypeID');
    }

    public function QuyUocDiem(){
        return $this->hasOne(QuyUocDiem::class, 'RecipeConventionID', 'IDRecipeConvention');
    }

    public function MonTuongDuongs(){
        // function Mons(){
            return $this->belongsToMany(Mon::class, 'ModulesEqual', 'ModulesID', 'ModulesIDEqual');
        // }
    }

    public function MonTienQuyets(){
        return $this->belongsToMany(Mon::class, 'ModulesPremise', 'ModulesID', 'ModulesIDPremise')
                ->where('ModulesPremise.del',0);

    }

    public function HocTruocMons(){
        return $this->belongsToMany(Mon::class, 'ModulesBefore', 'ModulesID', 'ModulesIDBefore')
                ->where('ModulesBefore.del',0);
    }



    // public function scopeDaiCuong($query){
    //     return $query->where('StructProgramID', 0);

    // }
    // public function scopeChuyenNganh($query){
    //     return $query->where('StructProgramID', 1);
    // }
    // public function scopeCoSoNganh($query){
    //     return $query->where('StructProgramID', 2);
    // }

}
