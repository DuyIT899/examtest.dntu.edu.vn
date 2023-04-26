<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuongTrinh extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'Program';

    protected $primaryKey = 'ProgramID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('Program.del', '=' , 0);
        });
    }

    public function ChuongTrinhMons(){
        return $this->hasMany(ChuongTrinhMon::class,'ProgramID','ProgramID') ?? NULL;
    }

    public function Mons(){
        return $this->belongsToMany(Mon::class,'ProgramModules', 'ProgramID', 'ModulesID');
    }

    //
    public function TuChon(){
        return $this->hasOne(ChuongTrinhTuChon::class,'ProgramID','ProgramID') ?? NULL;
    }

    public function MonBatBuocs(){
        return $this->belongsToMany(Mon::class,'ProgramModules', 'ProgramID', 'ModulesID')
        ->where('TypeID',0);
    }

    public function MonTuChons(){
        return $this->belongsToMany(Mon::class,'ProgramModules', 'ProgramID', 'ModulesID')
        ->where('TypeID',1);
    }

    public function scopeDaiCuong($query){
        return $query->where('StructProgramID', 0);
    }

    public function scopeChuyenNganh($query){
        return $query->where('StructProgramID', 1);
    }

    public function scopeCoSoNganh($query){
        return $query->where('StructProgramID', 2);
    }


    // function BoMons(){
    //     return $this->belongsToMany(BoMon::class, 'vnk_ModulesGroupUser', 'UserID', 'ModulesGroupID');
    // }

}
