<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiThi extends Model
{
    use HasFactory;

    protected $connection = 'quiz';

    protected $table = 'BaiThi';

    protected $fillable = ['Diem','UserId'];

}
