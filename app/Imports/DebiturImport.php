<?php

namespace App\Imports;

use App\Models\Debitur;
use Maatwebsite\Excel\Concerns\ToModel;

class DebiturImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Debitur([
            'NAMA_DEBITUR' => $row[2],
            'TANGGAL_LAHIR' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3]),
            'NO_KTP' => $row[4],
            'NO_NPWP' => $row[5],
            'ALAMAT_CUSTOMER' => $row[6],
            'PROVINSI' => $row[7],
            'KABUPATEN_KOTA' => $row[8],
            'KECAMATAN' => $row[9],
            'KELURAHAN' => $row[10],
            'KODE_POS' => $row[11],
            'NAMA_PERUSAHAAN' => $row[12],
            'BIDANG_USAHA' => $row[13],
            'SUB_BIDANG_USAHA' => $row[14],
            'LAMA_USAHA' => $row[15],
            'JABATAN' => $row[16],
            'TANGGUNGAN' => $row[17],
            'INCOME_BULAN' => $row[18],
            'SUPOUSE_INCOME_BULAN' => $row[19],
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1' => $row[20],
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2' => $row[21],
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3' => $row[22],
            'APAKAH_ADA_DP' => $row[23],
            'DOWN_PAYMENT_CUSTOMER' => $row[24],
        ]);
    }
}
