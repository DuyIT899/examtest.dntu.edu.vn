<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nganh extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'Industry';

    protected $primaryKey = 'IndustryID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }

    public function Khoa(){
        return $this->hasOne(Khoa::class, 'DepartmentID', 'DepartmentID');
    }

    public function TrinhDoDaoTao(){
        return $this->hasOne(TrinhDoDaoTao::class, 'TranningLevelID', 'TranningLevelID');
    }

    function BoMons(){
        return $this->belongsToMany(BoMon::class, 'vnk_ModulesGroupIndustry', 'ModulesGroupID', 'IndustryID');
    }
}
