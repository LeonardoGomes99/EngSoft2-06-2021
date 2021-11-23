<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'model',
        'serial_number',
        'color'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
