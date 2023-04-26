<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'vnk_Department';

    protected $primaryKey = 'DepartmentID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }

    public function Mons(){
        return $this->hasMany(Mon::class, 'DepartmentID', 'DepartmentID');
    }

    // public function scopeSinhVien($query)
    // {
    //     return $query->where('UserType', 0);
    // }

}
