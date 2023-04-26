<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $connection = 'quiz';

    protected $table = 'User';

    protected $fillable = ['UserName','FullName'];


    // protected $primaryKey = 'Id';

    // public $timestamps = FALSE;

    // protected $hidden = [
    //     'Password', 'FirstPass'
    // ];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope(function ($query) {
    //         $query->where('del', '=' , 0);

    //     });
    // }

//     public function ChiTiet(){
//         return $this->hasOne(User_ChiTiet::class, 'UserID', 'UserID');
//     }

//     public function NhatKyPhis(){
//         return $this->hasMany(NhatKyPhi::class, 'UserID', 'UserID');
//     }

//     public function NguoiTao(){
//         return $this->hasOne(User::class, 'UserID', 'OwnerID');
//     }
}

// use Laravel\Sanctum\HasApiTokens;

// class User extends Authenticatable
// {
//     use HasApiTokens, HasFactory, Notifiable;
// }
