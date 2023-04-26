<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinhThanhPho extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_Province';

    protected $primaryKey = 'ProvinceID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }

    public function QuanHuyens(){
        return $this->hasMany(QuanHuyen::class, 'ProvinceID', 'ProvinceID');
    }
}
