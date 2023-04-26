<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanToc extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_Ethnic';

    protected $primaryKey = 'EthnicID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }
}
