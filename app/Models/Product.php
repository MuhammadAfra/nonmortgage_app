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
        'KONVEN_SYARIAH',
        'NAMA_DEBITUR',
        'NILAI_PEMBIAYAAN_POKOK_MAXIMUM',
        // suku bunga no field
        'Jangka_Waktu_Maximum',
        // pola pembayaran no field
        'BIAYA_ADMINISTRASI',
        'BIAYA_ASSURANSI',
        'BIAYA_PROVISI',
        'BIAYA_LAIN_LAIN'
    ];
    public $timestamps = false;
}
