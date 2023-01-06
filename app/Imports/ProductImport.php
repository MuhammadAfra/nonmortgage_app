<?php

namespace App\Imports;

use App\Models\Debitur;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Master_Product;
use App\Models\Master_Pola_Pembayaran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    private $partner;
    private $debitur;
    private $mproduct;
    private $pola;

    public function __construct(){
        $this->partner = Partner::select('id', 'NAMA_PERUSAHAAN')->get();
        $this->debitur = Debitur::select('id','NAMA_DEBITUR')->get();
        $this->mproduct = Master_Product::select('id','nama_product')->get();
        $this->pola = Master_Pola_Pembayaran::select('id','Pola_Pembayaran')->get();
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $partner = $this->partner->where('NAMA_PERUSAHAAN', $row['partner'])->first();
        $debitur =  $this->debitur->where('NAMA_DEBITUR', $row['debitur'])->first();
        $mproduct = $this->mproduct->where('nama_product', $row['jenis_produk'])->first();
        $pola =$this->pola->where('Pola_Pembayaran', $row['pola_pembayaran'])->first();


        return new Product([
        'PARTNER_ID' => $partner->id ?? NULL,
        'DEBITUR_ID' => $debitur->id ?? NULL,
        'M_PRODUCT_ID' => $mproduct->id ?? NULL,
        'NILAI_PEMBIAYAAN_POKOK_MAXIMUM'=> $row['nilai_pembiayaan_pokok_maximum'],
        'SUKU_BUNGA_FLAT'=> $row['suku_bunga_flat'],
        'SUKU_BUNGA_EFFECTIVE'=> $row['suku_bunga_effective'],
        'Jangka_Waktu_Maximum'=> $row['jangka_waktu_maximum'],
        'POLA_PEMBAYARAN_ID' => $pola->id ?? NULL,
        'BIAYA_ADMINISTRASI'=> $row['biaya_administrasi'],
        'BIAYA_ASSURANSI'=> $row['biaya_asuransi'],
        'BIAYA_PROVISI'=> $row['biaya_provinsi'],
        'BIAYA_LAIN_LAIN'=> $row['biaya_lain_lain'],
        ]);
    }

    
}
