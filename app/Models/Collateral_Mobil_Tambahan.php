<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collateral_Mobil_Tambahan extends Model
{
    use HasFactory;
    protected $table = 'collateral_mobil_tambahan';
    protected $guarded = [];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'PRODUCT_ID');
    }
}
