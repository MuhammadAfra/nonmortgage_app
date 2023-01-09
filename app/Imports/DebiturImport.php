<?php

namespace App\Imports;

use App\Models\Debitur;
use App\Models\Master_Asuransi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DebiturImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $debitur;
    public function __construct()
    {
        $this->debitur = Master_Asuransi::select('*')->get();
    }

    public function model(array $row)
    {
        $debitur = $this->debitur->where('Jenis_Asuransi', '=', $row['jenis_asuransi'])->first();
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
            'APAKAH_ADA_DP' => $row['apakah_ada_dp_yano'],
            'DOWN_PAYMENT_CUSTOMER' => $row['down_payment_customer'],
            'Jenis_Asuransi_Id' => $debitur->id ?? NULL,
            'Perusahaan_Asuransi' => $row['perusahaan_asuransi'],
            'Persen_Asuransi' => $row['persen_asuransi'],
            'Nilai_Asuransi' => $row['nilai_asuransi'],
            'Jaminan_Sertifikat_Tanah' => $row['jaminan_rumah_tanah'],
            'Nilai_Sertifikat_Tanah' => $row['nilai_jaminan_rumah_tanah'],
            'Jaminan_Kendaraan_Bermotor_Mobil' => $row['jaminan_motor'],
            'Nilai_Kendaraan_Bermotor_Mobil' => $row['nilai_jaminan_motor'],
            'Jaminan_Kendaraan_Bermotor_Motor' => $row['jaminan_mobil'],
            'Nilai_Kendaraan_Bermotor_Motor' => $row['nilai_jaminan_mobil'],
            'Jaminan_Personel_Guarantee' => $row['jaminan_personal'],
            'Nilai_Personel_Guarantee' => $row['nilai_jaminan_personal'],
            'Jaminan_Invoice' => $row['jaminan_invoice'],
            'Nilai_Invoice' => $row['nilai_jaminan_invoice'],
            'Jaminan_Inventory' => $row['jaminan_inventori'],
            'Nilai_Inventory' => $row['nilai_jaminan_inventori'],
            'Jaminan_Lainnya' => $row['jaminan_lainnya'],
        ]);
    }
}
