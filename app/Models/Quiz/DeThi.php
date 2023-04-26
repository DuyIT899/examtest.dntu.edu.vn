<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeThi extends Model
{
    use HasFactory;

    protected $connection = 'quiz';

    protected $table = 'De';

    protected $fillable = ['ThoiGianLamBai'];

}
