<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Sektor_Ekonomi extends Model
{
    use HasFactory;
    protected $table = 'master_sektor_ekonomi';
    protected $fillable = [
        'Sandi_Turunan', 'Label', 'Sandi_Utama', 'Label_Utama'
    ];

    public $timestamps = false;
}
