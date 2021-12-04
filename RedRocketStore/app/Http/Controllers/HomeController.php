<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Products;
use App\Models\Sales;

class HomeController extends Controller
{
    public function __construct(Users $Users, Products $Products, Sales $Sales)
    {
        $this->Users = $Users;
        $this->Products = $Products;
        $this->Sales = $Sales;
    }

    public function index()
    {
        return view('welcome');    
    }

    public function authenticatedLogin(Request $request){
        $checkLogin = $this->Users::WHERE(['email' => ($request->email), 'password' => ($request->pass) ])->get();
        
        if(!$checkLogin->count()){
            return response()->json(['message' => 'Login Invalido'], 400);
        }else{
            $request->session()->put('userinfo', $checkLogin);
            return response()->json(['message' => '/dashboard'], 200);
        }

    }

    public function logout(){
        session()->forget('userinfo');
        session()->flush();
        return redirect('/');  
    }

    public function dashboard(){

        $checkLogin = $this->checkSession();
        if($checkLogin == "logout"){
            return redirect('/');   
        }

        $products = $this->Products::all();
        $users = $this->Users::all();
        $amount_earned = $this->Sales->sum('total_amount_price');

        $amount_earned = number_format($amount_earned, 2, '.', '');

        return view('dashboard', [
            'productsData' => $products,
            'users' => $users,
            'session_user' => (session()->get('userinfo')[0]),
            'amount_earned' => $amount_earned,
        ]);
    }

    public function checkSession(){
        if(session()->get('userinfo')[0]['email'] == null){
           return "logout";  
        }
    }

}
