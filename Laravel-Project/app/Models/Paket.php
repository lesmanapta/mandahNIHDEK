<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = ['jenis_paket', 'email', 'nama', 'nomor_hp', 'alamat'];
}