<?php

namespace App\Models\QLDT;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonSinhVienDiem extends Model
{
    use HasFactory;

    protected $connection = 'qldt';

    protected $table = 'ModulesUserScore';

    public function scopeDiem($query, $mon_id, $user_id)
    {
        return $query->where('ModulesID', $mon_id)
                    ->where('UserID', $user_id);
    }
    // public function scopeKhoiTao($query)
    // {
    //     return $query->where('Status', 0);
    // }
    // public function CongThuc(){
    //     return $this->hasOne(CongThuc::class, 'FormulaTextID', 'FormulaID');
    // }

    // public function scopeDiemCongThuc($query, $congthuc_id, $diem){
    //     // return $this->hasOne(DiemCongThuc::class,  'FormulaID','FormulaTextID');
    //         // ->where('FormulaTextID','FormulaDetail.FormulaID');
    //         // ->orderBy('CreatedTime', 'DESC');

    //      return $query->join('FormulaDetail','ModulesUserScore.FormulaTextID',
    //                                                  '=','FormulaDetail.FormulaID')

    //                 ->where('FormulaDetail.EndScore','>=',$diem);
    //                 // ->where('FormulaDetail.StartScore','<=',$diem)
    //                 // ->first();

    // }
    // public function DiemTichLuy(){
    //     return $this->hasOne(DiemTichLuy::class, 'ModulesID', 'ModulesID')
    //                 ->where();
    // }

    public function Mon(){
        return $this->hasOne(Mon::class, 'ModulesID', 'ModulesID');
    }
}
