<?php

namespace App\Models;

use App\Http\Controllers\ProductController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaterals extends Model
{
    protected $table = 'collaterals';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
