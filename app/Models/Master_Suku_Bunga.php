<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Suku_Bunga extends Model
{
    use HasFactory;
    protected $table = 'master_suku_bunga';
    protected $guarded = [];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}