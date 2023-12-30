<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $table = 'alamat';
    protected $fillable = [
        'id',
        'nomor_telepon',
        'jalan',
        'kelurahan',
        'kecamatan', // Sesuaikan dengan nama kolom di tabel database
        'kabupaten',
        'kota',
        'provinsi',
        'kode_pos',
    ];
}
