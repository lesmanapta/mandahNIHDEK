<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'status', 'namapaket', 'namabandwith', 'harga', 'masa_aktif', 'masa_aktif_unit', 'nama_router', 'ippol'
    ];

    public function bandwidth()
    {
        return $this->belongsTo(Bandwidth::class, 'namabandwith', 'name_bw');
    }

    public function router()
    {
        return $this->belongsTo(Routers::class, 'nama_router', 'name');
    }

    public function pool()
    {
        return $this->belongsTo(Pool::class, 'ippol', 'pool_name');
    }
};