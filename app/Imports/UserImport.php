<?php

namespace App\Imports;

use App\Models\Quiz\CauHoi;
use App\Models\Quiz\DapAn;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class UserImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    { 
        // CauHoi::create([
        //     'cauhoi' => $row['question'],
        //     'idMon' => $row['subject'],
        //     'boDe' => $row['topic'],
        // ]);
        // $idCauHoi = CauHoi::where('cauhoi', $row['question'])->first()->IdCauHoi;
        // for($i=1;$i<5;$i++){
        //     DapAn::create([
        //         'idCauHoi' => $idCauHoi,
        //         'DapAn' => $row['answer'.''.$i],
        //         'isTrue' => $row['correct'.''.$i]
        //     ]);

        // }
    }
}
