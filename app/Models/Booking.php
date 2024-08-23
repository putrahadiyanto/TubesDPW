<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_armada',
        'id_user',
        'tanggal_pembuatan',
        'no_telp',
        'supir',
        'tanggal_mulai',
        'tanggal_akhir',
        'harga',
        'status_booking',
        'status_pembayaran'
    ];

    // Define relationships
    public function armada()
    {
        return $this->belongsTo(Armada::class, 'id_armada');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
