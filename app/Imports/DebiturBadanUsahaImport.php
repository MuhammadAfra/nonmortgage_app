<?php

namespace App\Imports;

use App\Models\Debitur_Badan_Usaha;
use Maatwebsite\Excel\Concerns\ToModel;

class DebiturBadanUsahaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Debitur_Badan_Usaha([
            //
        ]);
    }
}
