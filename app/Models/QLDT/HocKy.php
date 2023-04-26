<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HocKy extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'Semester';

    protected $primaryKey = 'SemesterID';

    // Không có del
    // public static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope(function ($query) {
    //         $query->where('del', '=' , 0);

    //     });
    // }
}
