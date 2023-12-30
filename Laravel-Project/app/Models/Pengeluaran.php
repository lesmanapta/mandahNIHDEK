<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = ['namakategori', 'namapengeluaran', 'hargapengeluaran'];

    // Jika diperlukan, tambahkan aturan validasi
    public static $rules = [
        'namakategori' => 'required|string',
        'namapengeluaran' => 'required|string',
        'hargapengeluaran' => 'required|numeric',
    ];

    // Metode atau relasi tambahan bisa ditambahkan di sini
}