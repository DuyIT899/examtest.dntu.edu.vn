<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'Class';

    protected $primaryKey = 'ClassID';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('del', '=' , 0);

        });
    }

    // All sinh viên trong lớp
    function SinhViens(){
        return $this->belongsToMany(SinhVien::class, 'ClassUser', 'ClassID', 'UserID');
    }

    public function Khung(){
        return $this->hasOne(Khung::class, 'CourseIndustryID', 'CourseIndustryID');
    }


}
