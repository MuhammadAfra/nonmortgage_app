<?php

namespace App\Imports;

use App\Models\Debitur;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DebiturImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Debitur([
            'NAMA_DEBITUR' => $row['nama_debitur'],
            'TANGGAL_LAHIR' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir']),
            'NO_KTP' => $row['no_ktp'],
            'NO_NPWP' => $row['no_npwp'],
            'ALAMAT_CUSTOMER' => $row['alamat_customer'],
            'PROVINSI' => $row['provinsi'],
            'KABUPATEN_KOTA' => $row['kabupaten_kota'],
            'KECAMATAN' => $row['kecamatan'],
            'KELURAHAN' => $row['kelurahan'],
            'KODE_POS' => $row['kode_pos'],
            'NAMA_PERUSAHAAN' => $row['nama_perusahaan'],
            'BIDANG_USAHA' => $row['bidang_usaha'],
            'SUB_BIDANG_USAHA' => $row['sub_bidang_usaha'],
            'LAMA_USAHA' => $row['lama_usaha'],
            'JABATAN' => $row['jabatan'],
            'TANGGUNGAN' => $row['tanggungan'],
            'INCOME_BULAN' => $row['income_bulan'],
            'SUPOUSE_INCOME_BULAN' => $row['supouse_income_bulan'],
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1' => $row['rekening_koran_3_bulan_terakhir_bulan_1'],
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2' => $row['rekening_koran_3_bulan_terakhir_bulan_2'],
            'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3' => $row['rekening_koran_3_bulan_terakhir_bulan_3'],
            'APAKAH_ADA_DP' => $row['apakah_ada_dp'],
            'DOWN_PAYMENT_CUSTOMER' => $row['down_payment_customer'],
        ]);
    }
}
