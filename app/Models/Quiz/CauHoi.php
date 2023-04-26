<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CauHoi extends Model
{
    use HasFactory;

    protected $connection = 'quiz';

    protected $table = 'CauHoi';

    protected $fillable = ['idMon','cauhoi','image', 'boDe','stt'];

}
