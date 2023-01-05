<?php

namespace App\Imports;

use App\Models\Debitur;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Master_Product;
use App\Models\Master_Pola_Pembayaran;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
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
        $partner = $this->partner->where('NAMA_PERUSAHAAN', $row[2])->first();
        $debitur =  $this->debitur->where('NAMA_DEBITUR', $row[3])->first();
        $mproduct = $this->mproduct->where('nama_product', $row[4])->first();
        $pola =$this->pola->where('Pola_Pembayaran', $row[9])->first();
        // dd($row);
        return new Product([
        'PARTNER_ID' => $partner->id ?? NULL,
        'DEBITUR_ID' => $debitur->id ?? NULL,
        'M_PRODUCT_ID' => $mproduct->id ?? NULL,
        'NILAI_PEMBIAYAAN_POKOK_MAXIMUM'=> $row[5],
        'SUKU_BUNGA_FLAT'=> $row[6],
        'SUKU_BUNGA_EFFECTIVE'=> $row[7],
        'Jangka_Waktu_Maximum'=> $row[8],
        'POLA_PEMBAYARAN_ID' => $pola->id ?? NULL,
        'BIAYA_ADMINISTRASI'=> $row[10],
        'BIAYA_ASSURANSI'=> $row[11],
        'BIAYA_PROVISI'=> $row[12],
        'BIAYA_LAIN_LAIN'=> $row[13],
        ]);
    }
}
