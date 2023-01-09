<?php

namespace App\Imports;

use App\Models\Master_Product;
use App\Models\Master_Asuransi;
use App\Models\Debitur_Badan_Usaha;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DebiturBadanUsahaImport implements ToModel, WithHeadingRow
{
    private $product;
    private $asuransi;

    public function __construct(){
        $this->product = Master_Product::select('*')->get();
        $this->asuransi = Master_Asuransi::select('*')->get();
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        $product = $this->product->where('nama_product', $row['detil_product_profile'])->first();
        $asuransi =  $this->asuransi->where('Jenis_Asuransi', $row['jenis_asuransi'])->first();
        return new Debitur_Badan_Usaha([
            'NAMA_PERUSAHAAN' => $row['nama_perusahaan'],
            'ALAMAT_PERUSAHAAN' => $row['alamat_perusahaan'],
            'STATUS_BADAN_HUKUM' => $row['status_badan_hukum'],
            'DETIL_PRODUCT_PROFILE' => $product->id ?? NULL,
            'Nama_Direktur_Utama' => $row['nama_direktur_utama'],
            'No_Identitas_Direktur_Utama' => $row['no_identitas_direktur_utama'],
            'Nama_Direktur1' => $row['nama_direktur_1'],
            'No_Identitas_Direktur1' => $row['no_identitas_direktur_1'],
            'Nama_Direktur_2' => $row['nama_direktur_2'],
            'No_Identitas_Direktur2' => $row['no_identitas_direktur_2'],
            'Status' => $row['status'],
            'APAKAH_ADA_DP' => $row['apakah_ada_dp_yano'],
            'DOWN_PAYMENT_CUSTOMER' => $row['down_payment_customer'],
            'Jenis_Asuransi_Id' => $asuransi->id ?? NULL,
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
