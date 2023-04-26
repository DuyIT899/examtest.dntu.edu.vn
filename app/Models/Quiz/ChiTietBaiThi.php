<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietBaiThi extends Model
{
    use HasFactory;

    protected $connection = 'quiz';

    protected $table = 'ChiTietBaiThi';

    protected $fillable = ['IdBaiThi','IdCauHoi','IdDapAn','IsCheck','IsTrue','sttCauHoi'];

}
