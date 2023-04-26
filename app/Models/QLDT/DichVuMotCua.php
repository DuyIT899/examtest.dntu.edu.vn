<?php

namespace App\Models\QLDT;


use App\Models\QLDT\KhoanThu;

class DichVuMotCua extends KhoanThu
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('TypeID', 2);
        });
    }


}
