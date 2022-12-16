<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Jenis_Pembiayaan extends Model
{
    use HasFactory;
    protected $table = 'master_jenis_pembiayaan';
    protected $fillable = [
        'jenis_pembiayaan',
        'id_product'
    ];

    public $timestamps = false;

    public function jenis_product()
    {
        return $this->belongsTo(Master_Jenis_Product::class, 'id_product');
    }
}
