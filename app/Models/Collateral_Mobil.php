<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collateral_Mobil extends Model
{
    use HasFactory;
    protected $table = 'collateral_mobil';
    protected $guarded = [];
    public $timestamps = false;

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'PARTNER_ID');
    }

    public function debitur()
    {
        return $this->belongsTo(Debitur::class, 'DEBITUR_ID');
    }

    public function debitur_badan_usaha()
    {
        return $this->belongsTo(Debitur_Badan_Usaha::class, 'DEBITUR_BADAN_USAHA_ID');
    }

}
