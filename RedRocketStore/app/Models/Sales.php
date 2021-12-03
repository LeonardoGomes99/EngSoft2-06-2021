<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'qtd',
        'product',
        'salesman',
        'uni_product_price',
        'total_amount_price',
        'sales_date'
    ];
}
