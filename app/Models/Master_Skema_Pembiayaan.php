<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Skema_Pembiayaan extends Model
{
    use HasFactory;
    protected $table = 'master_skema_pembiayaan';
    protected $fillable = [
        'skema_pembiayaan', 'id_jenis_pembiayaan'
    ];
    
    public $timestamps = false;
    public function jenis()
    {
        return $this->belongsTo(Master_Jenis_Pembiayaan::class, 'id_jenis_pembiayaan');
    }

}
