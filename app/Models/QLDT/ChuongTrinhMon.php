<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuongTrinhMon extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'ProgramModules';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('ProgramModules.del', '=' , 0);
        });
    }

    function Mon(){
        return $this->hasOne(Mon::class, 'ModulesID', 'ModulesID');
    }

    // function MonDiem(){
    //     return $this->hasOne(MonSinhVienDiem::class, 'ModulesID', 'ModulesID')
    //             where('UserID',);
    // }
}
