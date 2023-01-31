<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collateral_Rumah_Tambahan extends Model
{
    protected $table = 'collateral_rumah_tanah_tambahan';
    protected $guarded = [];
    public $timestamps = false;

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'PARTNER_ID');
    }

    public function debitur()
    {
        return $this->belongsTo(Debitur::class, 'DEBITUR_ID');
    }
}
