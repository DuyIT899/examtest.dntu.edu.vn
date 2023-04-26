<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiemTichLuy extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'FormulaDetail';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }

    public function scopeChiTiet($query, $congthuc_id, $diem){
             return $query->where('FormulaID',$congthuc_id)

                        ->where('StartScore','<=',$diem)
                        ->where('EndScore','>=',$diem)
                        ->first();

        }
}
