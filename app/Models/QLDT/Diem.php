<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diem extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_UserScore';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }

    public function scopeTX1($query)
    {
        return $query->where('ScoreType', 1);
    }

    public function scopeTX2($query)
    {
        return $query->where('ScoreType', 2);
    }

    public function scopeTX3($query)
    {
        return $query->where('ScoreType', 3);
    }

    public function scopeTX4($query)
    {
        return $query->where('ScoreType', 4);
    }

    public function scopeTX5($query)
    {
        return $query->where('ScoreType', 5);
    }

    public function scopeTX6($query)
    {
        return $query->where('ScoreType', 6);
    }

    public function scopeTBTX($query)
    {
        return $query->where('ScoreType', 19);
    }

    public function scopeGK($query)
    {
        return $query->where('ScoreType', 50);
    }

    public function scopeTL($query)
    {
        return $query->where('ScoreType', 15);
    }

    public function scopeThi($query)
    {
        return $query->where('ScoreType', 99);
    }

    public function scopeTBMon($query)
    {
        return $query->where('ScoreType', 20);
    }
}
