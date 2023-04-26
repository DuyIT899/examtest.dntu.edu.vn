<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhatKyPhi extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'LogCharge';

    protected $primaryKey = 'ChargeLogID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }

    public function KhoanPhi(){
        return $this->hasOne(KhoanPhi::class, 'ChannelAmountID', 'ChannelAmountID');
    }
}
