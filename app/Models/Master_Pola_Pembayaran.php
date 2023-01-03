<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Pola_Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'master_pola_pembayaran';
    protected $fillable = [
        'Pola_Pembayaran',
        'Nilai_Pola_Pembayaran'
    ];

    public $timestamps = false;

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
