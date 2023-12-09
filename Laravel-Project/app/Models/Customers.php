<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customers extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'customers';

    protected $fillable = [
        'username',
        'password',
        'fullnameCustomer', // Sesuaikan dengan nama kolom di tabel database
        'address',
        'phonenumber',
        'email',
        'last_login',
    ];

    // ...

}
