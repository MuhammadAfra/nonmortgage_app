<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collateral_Inventory extends Model
{
    protected $table = 'collateral_inventory';
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
