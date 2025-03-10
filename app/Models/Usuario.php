<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'nome', 'email', 'password', 'admin'
    ];

    protected $hidden = [
        'password'
    ];

}  