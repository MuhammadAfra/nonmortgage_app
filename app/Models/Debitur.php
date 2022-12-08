<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debitur extends Model
{
    use HasFactory;
    protected $table = 'debitur';
    protected $fillable = [
        'TANGGAL_LAHIR',
        'NO_KTP',
        'NO_NPWP',
        'ALAMAT_CUSTOMER',
        'PROVINSI',
        'KABUPATEN_KOTA',
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
}
