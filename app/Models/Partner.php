<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $table = 'partner';

    protected $guarded = [];

    public function master_product()
    {
        return $this->belongsTo(Master_Product::class, 'DETIL_PRODUCT_PROFILE');
    }
    
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    // public function product_colls()
    // {
    //     return $this->hasManyThrough(Collateral_Motor::class, Collateral_Invoice::class, Product::class, 'product_id', 'PARTNER_ID');
    // }

    // public function product_colls_tambahan()
    // {
    //     return $this->hasManyThrough(Collateral_Motor_Tambahan::class, Product::class, 'product_id', 'PARTNER_ID');
    // }

    // public function rumah_colls()
    // {
    //     return $this->hasManyThrough(Collateral_Rumah::class, Product::class, 'product_id', 'PARTNER_ID');
    // }

    // public function rumah_tbh_colls()
    // {
    //     return $this->hasManyThrough(Collateral_Rumah_Tambahan::class, Product::class, 'product_id', 'PARTNER_ID');
    // }

    // public function inven_colls()
    // {
    //     return $this->hasManyThrough(Collateral_Inventory::class, Product::class, 'product_id', 'PARTNER_ID');
    // }

    // public function inven_tbh_colls()
    // {
    //     return $this->hasManyThrough(Collateral_Inventory_Tambahan::class, Product::class, 'product_id', 'PARTNER_ID');
    // }

    // public function product_colls_mobil()
    // {
    //     return $this->hasManyThrough(Collateral_Mobil::class, Product::class, 'product_id', 'PARTNER_ID');
    // }

    // public function product_colls_mobil_tambahan()
    // {
    //     return $this->hasManyThrough(Collateral_Mobil_Tambahan::class, Product::class, 'product_id', 'PARTNER_ID');
    // }

    // public function invoice_colls()
    // {
    //     return $this->hasManyThrough(Collateral_Invoice::class, Product::class, 'product_id', 'PARTNER_ID');
    // }

    // public function invoice_tbh_colls()
    // {
    //     return $this->hasManyThrough(Collateral_Invoice_Tambahan::class, Product::class, 'product_id', 'PARTNER_ID');
    // }

    // public function corporate_colls()
    // {
    //     return $this->hasManyThrough(Collateral_Corporate::class, Product::class, 'product_id', 'PARTNER_ID');
    // }

    // public function corporate_colls_tambahan()
    // {
    //     return $this->hasManyThrough(Collateral_Corporate_Tambahan::class, Product::class, 'product_id', 'PARTNER_ID');
    // }

    public function debitur()
    {
        return $this->hasMany(Debitur::class);
    }

    public function debitur_bu()
    {
        return $this->hasMany(Debitur_Badan_Usaha::class);
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

    public function coll_motor_tambahan()
    {
        return $this->hasMany(Collateral_Motor_Tambahan::class);
    }

    public function coll_mobil_tambahan()
    {
        return $this->hasMany(Collateral_Mobil_Tambahan::class);
    }

    public function coll_invoice_tambahan()
    {
        return $this->hasMany(Collateral_Invoice_Tambahan::class);
    }

    public function coll_inventory_tambahan()
    {
        return $this->hasMany(Collateral_Inventory_Tambahan::class);
    }

    public function coll_rumah_tambahan()
    {
        return $this->hasMany(Collateral_Rumah_Tambahan::class);
    }

    public function coll_corporate_tambahan()
    {
        return $this->hasMany(Collateral_Corporate_Tambahan::class);
    }
    public $timestamps = false;
}