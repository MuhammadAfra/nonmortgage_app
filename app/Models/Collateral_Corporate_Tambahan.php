<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collateral_Corporate_Tambahan extends Model
{
    use HasFactory;
    protected $table = 'collateral_corporate_guarantee_tambahan';
    protected $guarded = [];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'PRODUCT_ID');
    }
}
