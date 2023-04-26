<?php

namespace App\Models\QLDT;

use App\Models\QLDT\User;

class ThiSinh extends User
{
    public function scopeThiSinhs_By_KeHoachThiID_PhongThiID($query, $KeHoachThiID, $PhongThiID)
    {

        

        // return $this->hasMany(SoBaoDanhPhongThis::class, 'UserID', 'UserID')
        //         ->select('items.name')
        //         ->join('items', 'bundle.child_item_id','=', 'items.item_id')
        //         ->where('items.category_id', 10);

            
        // SinhVien::join('votes', 'votes.[UserID]', '=', 'friend.[UserID]')->orderBy('created_at', 'DESC')->get(['votes.*']);


        // return 'abc';
        // return SoBaoDanhPhongThis::where('ExamPlanTimeID', $KeHoachThiID)
        //             ->select(DB::raw('DISTINCT ExamZoomID, COUNT(*) AS SoThiSinh'))
        //             ->groupBy('ExamZoomID')
        //             ->get();
    }
}