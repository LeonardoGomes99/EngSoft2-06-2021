<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public $timestamps = true;


    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'model',
        'serial_number',
        'color',
        'added_at',
        'remember_token',
        'created_at',
        'updated_at'
    ];
}
