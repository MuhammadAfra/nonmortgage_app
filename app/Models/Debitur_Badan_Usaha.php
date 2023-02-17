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

    public function pola_pembayaran()
    {
        return $this->belongsTo(Master_Pola_Pembayaran::class, 'POLA_PEMBAYARAN_ID');
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

     public function coll_motor()
     {
         return $this->hasMany(Collateral_Motor::class);
     }

     public function coll_motor_tambahan()
     {
         return $this->hasMany(Collateral_Motor_Tambahan::class);
     }

     public function coll_mobil()
     {
         return $this->hasMany(Collateral_Mobil::class);
     } 
     
     public function coll_mobil_tambahan()
     {
         return $this->hasMany(Collateral_Mobil_Tambahan::class);
     } 

     public function coll_rumah()
     {
         return $this->hasMany(Collateral_Rumah::class);
     } 

     public function coll_rumah_tambahan()
     {
         return $this->hasMany(Collateral_Rumah_Tambahan::class);
     } 

     public function coll_inven()
     {
         return $this->hasMany(Collateral_Inventory::class);
     } 
     public function coll_inven_tambahan()
     {
         return $this->hasMany(Collateral_Inventory_Tambahan::class);
     } 
     
     public function coll_invoice()
     {
         return $this->hasMany(Collateral_Invoice::class);
     } 
     public function coll_invoice_tambahan()
     {
         return $this->hasMany(Collateral_Invoice_Tambahan::class);
     } 

     public function coll_corporate()
     {
         return $this->hasMany(Collateral_Corporate::class);
     } 
     
     public function coll_corporate_tambahan()
     {
         return $this->hasMany(Collateral_Corporate_Tambahan::class);
     } 

    public $timestamps = false;
}
