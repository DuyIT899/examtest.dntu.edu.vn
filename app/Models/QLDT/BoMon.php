<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoMon extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_ModulesGroup';

    protected $primaryKey = 'ModulesGroupID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('vnk_ModulesGroup.del', '=' , 0);

        });
    }

    function Mons(){
        return $this->belongsToMany(Mon::class, 'vnk_ModulesGroupJoin', 'ModulesGroupID', 'ModulesID');
    }

}
