<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bandwidth extends Model
{
    use HasFactory;

    protected $table = 'bandwidth'; // Sesuaikan dengan nama tabel yang Anda buat

    protected $fillable = [
        'name_bw',
        'rate_down',
        'rate_down_unit',
        'rate_up',
        'rate_up_unit',
        // Tambahkan kolom lainnya sesuai kebutuhan
    ];

    protected $casts = [
        'rate_down' => 'integer',
        'rate_up' => 'integer',
    ];

    // Tambahan metode atau relasi bisa ditambahkan di sini
}
