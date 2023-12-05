<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    protected $table = 'users'; // Set the table name

    protected $fillable = [
        'username',
        'fullname',
        'password',
        'user_type',
        'status',
        'last_login',
        // Add other columns as needed
    ];

    // Additional model configuration or methods can be added here
}
