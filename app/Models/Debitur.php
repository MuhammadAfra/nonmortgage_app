<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debitur extends Model
{
    use HasFactory;
    protected $table = 'debitur';
    protected $fillable = [
        'PARTNER_ID',
        'NAMA_DEBITUR',
        'TANGGAL_LAHIR',
        'NO_KTP',
        'UPLOAD_KTP',
        'NO_NPWP',
        'UPLOAD_NPWP',
        'ALAMAT_CUSTOMER',
        'PROVINSI',
        'KABUPATEN_KOTA',
        'KECAMATAN',
        'KELURAHAN',
        'KODE_POS',
        'NAMA_PERUSAHAAN',
        'BIDANG_USAHA',
        'LAMA_USAHA',
        'JABATAN',
        'TANGGUNGAN',
        'INCOME_BULAN',
        'SUPOUSE_INCOME_BULAN',
        'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1',
        'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2',
        'REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3',
        'Jenis_Asuransi_Id',
        'Perusahaan_Asuransi',
        'Persen_Asuransi',
        'Nilai_Asuransi',
        'Jaminan_Sertifikat_Tanah',
        'Nilai_Sertifikat_Tanah',
        'Jaminan_Kendaraan_Bermotor_Mobil',
        'Nilai_Kendaraan_Bermotor_Mobil',
        'Jaminan_Kendaraan_Bermotor_Motor',
        'Nilai_Kendaraan_Bermotor_Motor',
        'Jaminan_Personel_Guarantee',
        'Nilai_Personel_Guarantee',
        'Jaminan_Invoice',
        'Nilai_Invoice',
        'Jaminan_Inventory',
        'Nilai_Inventory',
        'Jaminan_Lainnya',
        'Nilai_Jaminan_Lainnya',
        'PENGAJUAN_LAIN_LAIN',
        'APAKAH_ADA_DP',
        'DOWN_PAYMENT_CUSTOMER',
    ];
    
    public $timestamps = false;

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function sektor()
    {
        return $this->belongsTo(Master_Sektor_Ekonomi::class, 'BIDANG_USAHA');
    }
    
    // public function product_colls()
    // {
    //     return $this->hasManyThrough(Collateral_Motor::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    // }
    
    public function product_colls_tambahan()
    {
        return $this->hasManyThrough(Collateral_Motor_Tambahan::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    }

        // public function product_colls_mobil()
    // {
    //     return $this->hasManyThrough(Collateral_Mobil::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    // }

    public function product_colls_mobil_tambahan()
    {
        return $this->hasManyThrough(Collateral_Mobil_Tambahan::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    }

    // public function rumah_colls()
    // {
    //     return $this->hasManyThrough(Collateral_Rumah::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    // }

    public function rumah_tbh_colls()
    {
        return $this->hasManyThrough(Collateral_Rumah_Tambahan::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    }

    // public function inven_colls()
    // {
    //     return $this->hasManyThrough(Collateral_Inventory::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    // }

    public function inven_tbh_colls()
    {
        return $this->hasManyThrough(Collateral_Inventory_Tambahan::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    }

    // public function corporate_colls()
    // {
    //     return $this->hasManyThrough(Collateral_Corporate::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    // }

    public function corporate_tbh_colls()
    {
        return $this->hasManyThrough(Collateral_Corporate_Tambahan::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    }

    // public function invoice_colls()
    // {
    //     return $this->hasManyThrough(Collateral_Invoice::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    // }

    public function invoice_tbh_colls()
    {
        return $this->hasManyThrough(Collateral_Invoice_Tambahan::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    }
    

    // public function corporate_colls_tambahan()
    // {
    //     return $this->hasManyThrough(Collateral_Corporate_Tambahan::class, Product::class, 'debitur_id', 'DEBITUR_ID');
    // }

    public function asuransi()
    {
        return $this->belongsTo(Master_Asuransi::class, 'Jenis_Asuransi_Id');
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'PARTNER_ID');
    }

    public function debitur()
    {
        return $this->hasMany(Debitur::class);
    }

    public function coll_motor()
    {
        return $this->hasMany(Collateral_Motor::class);
    }

    public function coll_mobil()
    {
        return $this->hasMany(Collateral_Mobil::class);
    }

    public function coll_invoice()
    {
        return $this->hasMany(Collateral_Invoice::class);
    }

    public function coll_inventory()
    {
        return $this->hasMany(Collateral_Inventory::class);
    }

    public function coll_rumah()
    {
        return $this->hasMany(Collateral_Rumah::class);
    }

    public function coll_corporate()
    {
        return $this->hasMany(Collateral_Corporate::class);
    }
}
