<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XetTotNghiep extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'GraduatedConsider';

    protected $primaryKey = 'ID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }
}
