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

        
        $product = $this->product->where('nama_product', $row['detail_product_profile'])->first();
        $asuransi =  $this->asuransi->where('jenis_asuransi', $row['jenis_asuransi'])->first();

        return new Debitur_Badan_Usaha([
            'NAMA_PERUSAHAAN' => $row['nama_perusahaan'],
            'ALAMAT_PERUSAHAAN' => $row['alamat_perusahaan'],
            'STATUS_BADAN_HUKUM' => $row['status_badan_hukum'],
            'DETIL_PRODUCT_PROFILE ' => $product->id ?? NULL, //relasi
            'Nama_Direktur_Utama' => $row['nama_direktur_utama'],
            'PROVINSI' => $row['provinsi'],
            'No_Identitas_Direktur_Utama' => $row['no_identitas_direktur_utama'],
            'Nama_Direktur_1' => $row['nama_direktur_1'],
            'No_Identitas_Direktur_1' => $row['no_identitas_direktur_1'],
            'Nama_Direktur1' => $row['nama_direktur1'],
            'No_Identitas_Direktur1' => $row['no_identitas_direktur1'],
            'Nama_Direktur_2' => $row['nama_direktur_2'],
            'No_Identitas_Direktur2' => $row['no_identitas_direktur2'],
            'Jenis_Asuransi_Id' => $asuransi->id ?? NULL,  //relasi
            'Perusahaan_Asuransi' => $row['perusahaan_asuransi'],
            'Persen_Asuransi' => $row['persen_asuransi'],
            'Nilai_Asuransi' => $row['nilai_asuransi'],
            'Jaminan_Sertifikat_Tanah' => $row['jaminan_sertifikat_tanah'],
            'Nilai_Sertifikat_Tanah' => $row['nilai_sertifikat_tanah'],
            'Jaminan_Kendaraan_Bermotor_Mobil' => $row['jaminan_kendaraan_bermotor_mobil'],
            'Nilai_Kendaraan_Bermotor_Mobil' => $row['nilai_kendaraan_bermotor_mobil'],
            'Jaminan_Kendaraan_Bermotor_Motor' => $row['jaminan_kendaraan_bermotor_motor'],
            'Jaminan_Personel_Guarantee' => $row['jaminan_personel_guarantee'],
            'Nilai_Personel_Guarantee' => $row['nilai_personel_guarantee'],
            'Jaminan_Invoice' => $row['jaminan_invoice'],
            'Nilai_Invoice' => $row['nilai_invoice'],
            'Jaminan_Inventory' => $row['jaminan_inventory'],
            'Nilai_Inventory' => $row['nilai_inventory'],
            'Jaminan_Lainnya' => $row['jaminan_lainnya'],
            'APAKAH_ADA_DP' => $row['apakah_ada_dp'],
            'DOWN_PAYMENT_CUSTOMER	' => $row['down_payment_customer'],
        ]);
    }
}
