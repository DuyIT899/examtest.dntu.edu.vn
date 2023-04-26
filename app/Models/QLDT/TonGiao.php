<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TonGiao extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_Religion';

    protected $primaryKey = 'ReligionID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }
}
