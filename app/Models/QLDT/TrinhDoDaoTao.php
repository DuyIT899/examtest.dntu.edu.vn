<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrinhDoDaoTao extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_TranningLevel';

    protected $primaryKey = 'TranningLevelID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }
}
