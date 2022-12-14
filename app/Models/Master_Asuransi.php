<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Asuransi extends Model
{
    use HasFactory;
    protected $table = 'master_asuransi';
    protected $fillable = [
        'jenis_asuransi'
    ];

    public $timestamps = false;

    public function debitur()
    {
        return $this->hasMany(Debitur::class);
    }

    public function debitur_badan_usaha()
    {
        return $this->hasMany(Debitur_Badan_Usaha::class);
    }

}
