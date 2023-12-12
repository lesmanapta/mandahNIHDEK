<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pool extends Model
{
    use HasFactory;
    protected $table = 'pool';

    protected $fillable = [
        'poolname',
        'range_ip',
        'routers'
    ];
}
