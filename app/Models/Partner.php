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
        'NPWP',
        'Nama_Direktur_Utama',
        'No_Identitas_Direktur_Utama',
        'Nama_Direktur1',
        'No_Identitas_Direktur1',   
        'Nama_Direktur_2',
        'No_Identitas_Direktur2',
        'MODAL_PENDIRIAN',
        'MODAL_PERUBAHAN_TERAKHIR',
        'AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS',
        'IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR',
        'BANK_STATEMENT_LAST_3_MONTHS',
        'FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS',
        'DRAFT_TEMPLATE_AGREEMENT_END_USER',
        'CONTOH_RISK_ACCEPTANCE_CRITERIA',
        'NDA_DOCUMENT',
        'Jenis_Assuransi',
        'Nama_Perusahaan_Assuransi',
        'Persen_Assuransi',
        'Nilai_Assuransi_Rupiah',
        'Status',
    ];
    
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function product_colls()
    {
        return $this->hasManyThrough(Collateral_Motor::class, Collateral_Invoice::class, Product::class, 'product_id', 'PARTNER_ID');
    }

    public function rumah_colls()
    {
        return $this->hasManyThrough(Collateral_Rumah::class, Product::class, 'product_id', 'PARTNER_ID');
    }

    public function inven_colls()
    {
        return $this->hasManyThrough(Collateral_Inventory::class, Product::class, 'product_id', 'PARTNER_ID');
    }

    public function master_product()
    {
        return $this->belongsTo(Master_Product::class, 'DETIL_PRODUCT_PROFILE');
    }

    public function product_colls_mobil()
    {
        return $this->hasManyThrough(Collateral_Mobil::class, Product::class, 'product_id', 'PARTNER_ID');
    }

    public $timestamps = false;
}