<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debitur_Badan_Usaha extends Model
{
    protected $table = 'debitur_badan_usaha';
    protected $guarded = [];

    public function asuransi()
    {
        return $this->belongsTo(Master_Asuransi::class, 'Jenis_Asuransi_Id');
    }

    public function detil_product()
    {
        return $this->belongsTo(Master_Product::class, 'DETIL_PRODUCT_PROFILE');
    }

     // GET DATA PARTNER
     public function partner()
     {
         return $this->belongsTo(Partner::class, 'PARTNER_ID');
     }
 
     public function debitur_badan_usaha()
     {
         return $this->hasMany(Debitur_Badan_Usaha::class);
     }

    public $timestamps = false;
}
