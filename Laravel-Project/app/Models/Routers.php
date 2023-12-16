<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routers extends Model
{
    use HasFactory;

    protected $table = 'routers';

    protected $fillable = [
        'name',
        'ip_address',
        'username',
        'password',
        'deskripsi',
        'status',
    ];
    public $timestamps = false; // Menonaktifkan created_at dan updated_at
}