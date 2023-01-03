<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Jenis_Product extends Model
{
    use HasFactory;
    protected $table = 'master_jenis_product';
    protected $fillable = ['Product'];

    public $timestamps = false;

    public function skema_jenis()
    {
        return $this->hasManyThrough(Master_Skema_Pembiayaan::class, Master_Jenis_Pembiayaan::class, 'id_jenis_pembiayaan', 'id_product');
    }

    public function jenis_pembiayaan()
    {
        return $this->hasMany(Master_Jenis_Pembiayaan::class);
    }

    public function product()
    {
        return $this->hasManyThrough(Product::class, Master_Suku_Bunga::class, 'SUKU_BUNGA_ID', 'konven_syariah_id ');
    }

    public function sukuBunga()
    {
        return $this->hasMany(Master_Suku_Bunga::class);
    }
}
