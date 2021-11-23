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
        $products = $this->Products::all();
        $users = $this->Users::all();

        return view('dashboard', [
            'productsData' => $products,
            'users' => $users,
        ]);
    }

}
