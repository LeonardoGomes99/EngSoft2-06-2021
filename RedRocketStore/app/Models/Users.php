<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    use HasFactory;

    protected $fillable = [
        'uuid',
        'name',
        'cpf',
        'birthdate',
        'gender',
        'email',
        'job',
        'password',
        'email_verified_at',
        'remember_token',
        'created_at',
        'updated_at'
    ];
    
}
