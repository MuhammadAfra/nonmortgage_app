<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'id',
        'PARTNER_ID',
        'DEBITUR_ID',
        'M_PRODUCT_ID',
        'NAMA_DEBITUR',
        'NILAI_PEMBIAYAAN_POKOK_MAXIMUM',
        'SUKU_BUNGA_FLAT',
        'SUKU_BUNGA_EFFECTIVE',
        'Jangka_Waktu_Maximum',
        'POLA_PEMBAYARAN_ID',
        'BIAYA_ADMINISTRASI',
        'BIAYA_ASSURANSI',
        'BIAYA_PROVISI',
        'BIAYA_LAIN_LAIN'
    ];
    public $timestamps = false;

    // GET DATA DEBITUR
    public function debitur()
    {
        return $this->belongsTo(Debitur::class, 'DEBITUR_ID');
    }

    // GET DATA MASTER POLA PEMBAYARAN
    public function pola_pembayaran()
    {
        return $this->belongsTo(Master_Pola_Pembayaran::class, 'POLA_PEMBAYARAN_ID');
    }

    // GET DATA PARTNER
    public function partner()
    {
        return $this->belongsTo(Partner::class, 'PARTNER_ID');
    }

    // GET DATA JENIS PRODUCT
    public function m_product()
    {
        return $this->belongsTo(Master_Product::class, 'M_PRODUCT_ID');
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
