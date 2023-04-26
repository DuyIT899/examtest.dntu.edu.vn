<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_District';

    protected $primaryKey = 'DistrictID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }

    public function PhuongXas(){
        return $this->hasMany(PhuongXa::class, 'DistrictID', 'DistrictID');
    }
}
