<?php

namespace App\Imports;

use App\Models\Master_Product;
use App\Models\Partner;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PartnerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $mproduct;

    public function __construct()
    {
        $this->mproduct = Master_Product::select('*')->get();
    }

    public function model(array $row)
    {
        $mproduct = $this->mproduct->where('nama_product', '=', $row['detil_product_profile'])->first();
        // dd($mproduct);
        return new Partner([
            'NAMA_PERUSAHAAN' => $row['nama_perusahaan'],
            'ALAMAT_PERUSAHAAN' => $row['alamat_perusahaan'],
            'STATUS_BADAN_HUKUM' => $row['status_badan_hukum'],
            'DETIL_PRODUCT_PROFILE' => $mproduct->id ?? NULL,
            'Nama_Direktur_Utama' => $row['nama_direktur_utama'],
            'No_Identitas_Direktur_Utama' => $row['no_identitas_direktur_utama'],
            'Nama_Direktur1' => $row['nama_direktur_1'],
            'No_Identitas_Direktur1' => $row['no_identitas_direktur_1'],
            'Nama_Direktur_2' => $row['nama_direktur_2'],
            'No_Identitas_Direktur2' => $row['no_identitas_direktur_2'],
            'Status' => $row['status'],
        ]);
    }
}
