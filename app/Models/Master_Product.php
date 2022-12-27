<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Product extends Model
{
    use HasFactory;
    protected $table = 'master_product';
    protected $fillable = [
        'id_master_product', 'nama_product'
    ];

    public $timestamps = false;

    public function partner()
    {
        return $this->hasMany(Partner::class);
    }
}
