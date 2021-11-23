<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Products;

class HomeController extends Controller
{
    public function __construct(Users $Users, Products $Products)
    {
        $this->Users = $Users;
        $this->Products = $Products;
    }

    public function index()
    {
        return view('welcome');    
    }

    public function authenticatedLogin(Request $request){
        $checkLogin = $this->Users::WHERE(['email' => ($request->email), 'password' => ($request->pass) ])->get();
        
        if(!$checkLogin->count()){
            return response()->json(['message' => 'Login Invalido'], 500);
        }else{
            return response()->json(['message' => '/dashboard'], 200);
        }

    }

    public function dashboard(){
        return view('dashboard');
    }

    public function createProduct(){
        return view('create_product');
    }

    public function storeProduct(Request $request){
        $this->Products->name = $request->nome;
        $this->Products->description = $request->desc;
        $this->Products->quantity = $request->qnt;
        $this->Products->model = $request->model;
        $this->Products->serial_number = $request->serial;
        $this->Products->color = $request->cor;
        $this->Products->save();
        return response()->json(['message' => '/dashboard'], 200);

    }

    public function productsAll(){
        $products = $this->Products::all();
        return view('products', [
            'productsData' => $products,
        ]);

    }
}
