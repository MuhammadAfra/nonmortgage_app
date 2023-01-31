<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collateral_Corporate_Tambahan extends Model
{
    use HasFactory;
    protected $table = 'collateral_corporate_guarantee_tambahan';
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
