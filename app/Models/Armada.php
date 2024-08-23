<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{

    protected $fillable = [
        'merk',
        'model',
        'nik',
        'kilometer',
        'bahan_bakar',
        'no_plat',
        'transmisi',
        'warna',
        'harga',
        'status',
        'foto'
    ];
    

    

    use HasFactory;
}
