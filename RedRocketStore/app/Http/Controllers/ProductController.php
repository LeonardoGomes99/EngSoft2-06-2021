<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function create()
    {
        return view('register.create-product');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'quantity' => 'required|min:1',
            'model' => 'required',
            'serial_number' => 'required',
            'color' => 'required',
        ]);

        Product::create($attributes);

        return redirect(route('index'))->with('success', 'O produto foi criado com sucesso.');
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('edit-product')->withProduct($product);
    }
}
