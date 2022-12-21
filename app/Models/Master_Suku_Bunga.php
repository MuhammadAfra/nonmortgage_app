<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Suku_Bunga extends Model
{
    use HasFactory;
    protected $table = 'master_suku_bunga';
    protected $fillable = [
        'Suku_Bunga', 'Nilai_Suku_Bunga', 'konven_syariah_id'
    ];

    public $timestamps = false;

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function jp()
    {
        return $this->belongsTo(Master_Jenis_Product::class, 'konven_syariah_id');
    }
}
