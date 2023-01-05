<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debitur extends Model
{
    use HasFactory;
    protected $table = 'debitur';
    protected $fillable = [
        'NAMA_DEBITUR',
        'TANGGAL_LAHIR',
        'NO_KTP',
        'NO_NPWP',
        'ALAMAT_CUSTOMER',
        'PROVINSI',
        'KABUPATEN_KOTA',
        'KECAMATAN',
        'KELURAHAN',
        'KODE_POS',
        'NAMA_PERUSAHAAN',
        'BIDANG_USAHA',
        'SUB_BIDANG_USAHA',
        'LAMA_USAHA',
        'JABATAN',
        'TANGGUNGAN',
        'INCOME_BULAN',
        'SUPOUSE_INCOME_BULAN',
        'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1',
        'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2',
        'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3',
        'APAKAH_ADA_DP',
        'DOWN_PAYMENT_CUSTOMER',
    ];
    public $timestamps = false;

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function product_colls()
    {
        return $this->hasManyThrough(Collateral_Motor::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    }

    public function rumah_colls()
    {
        return $this->hasManyThrough(Collateral_Rumah::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    }

    public function rumah_tbh_colls()
    {
        return $this->hasManyThrough(Collateral_Rumah_Tambahan::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    }

    public function inven_colls()
    {
        return $this->hasManyThrough(Collateral_Inventory::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    }

    public function inven_tbh_colls()
    {
        return $this->hasManyThrough(Collateral_Inventory_Tambahan::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    }

    public function corporate_tbh_colls()
    {
        return $this->hasManyThrough(Collateral_Corporate_Tambahan::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    }
    
    public function product_colls_mobil()
    {
        return $this->hasManyThrough(Collateral_Mobil::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    }
}
