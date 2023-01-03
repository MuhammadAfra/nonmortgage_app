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
}
