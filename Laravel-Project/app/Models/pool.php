<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pool extends Model
{
    protected $table = 'pool';
    protected $fillable = [
        'pool_name',
        'range_ip',
        'routers'
    ];
}

