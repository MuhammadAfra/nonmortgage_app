<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $table = 'partner';

    protected $fillable = [
        'NAMA_PERUSAHAAN',
        'ALAMAT_PERUSAHAAN',
        'STATUS_BADAN_HUKUM',
        'AKTE_PENDIRIAN',
        'COMPANY_PROFILE',
        'DETIL_PRODUCT_PROFILE',
        'AKTE_PERUBAHAN_ANGGARAN_DASAR',
        'SIUP',
        'TDP',
        'Nama_Direktur_Utama',
        'No_HP_Dirut',
        'Nama_Direktur1',
        'No_HP_Direktur1',
        'Nama_Direktur_2',
        'No_HP_Direktur2',
        'MODAL_PENDIRIAN',
        'MODAL_PERUBAHAN_TERAKHIR',
        'AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS',
        'IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR',
        'BANK_STATEMENT_LAST_3_MONTHS',
        'FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS',
        'DRAFT_TEMPLATE_AGREEMENT_END_USER',
        'CONTOH_RISK_ACCEPTANCE_CRITERIA',
        'NDA_DOCUMENT',
        'status',
    ];
    
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
