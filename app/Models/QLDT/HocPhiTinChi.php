<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Học phí 1 tín chỉ
// Dựa trên KhoaHocChuyenNganh và LoaiHocPhan
class HocPhiTinChi extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'ChannelAmountFee_CI';

    protected $primaryKey = 'ID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }
}
