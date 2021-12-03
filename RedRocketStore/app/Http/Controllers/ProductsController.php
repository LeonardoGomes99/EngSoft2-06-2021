<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Sales;
use App\Exports\salesReport;
use Maatwebsite\Excel\Facades\Excel;


class ProductsController extends Controller
{
    public function __construct(Products $Products, Sales $Sales)
    {
        $this->Products = $Products;
        $this->Sales = $Sales;
    }

    public function createProduct(){
        $checkLogin = $this->checkSession();
        if($checkLogin == "logout"){
            return redirect('/');   
        }

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
    

    public function edit(Request $request){

        $checkLogin = $this->checkSession();
        if($checkLogin == "logout"){
            return redirect('/');   
        }

        $productEdit = $this->Products->where('id', $request->id)->get();
        return view('edit_product', [
            'productsData' => $productEdit,
        ]);   
    }

    public function editStore(Request $request){
        $this->Products
        ->where('id', $request->id)
        ->update(
            [
            'name' =>  $request->nome,
            'description' =>  $request->desc,
            'quantity' =>  $request->qnt,
            'model' =>  $request->model,
            'serial_number' =>  $request->serial,
            'color' =>  $request->cor
            ]);
        return response()->json(['message' => '/dashboard'], 200);


                
    }

    public function removeProduct(Request $request){
        $this->Products->where('id', $request->id)->delete();
        return response()->json(['message' => '/dashboard'], 200);
    }

    public function ExportData(){
        return \Excel::download(new salesReport, 'vendas.xlsx');
    }

    public function simulateSells(){
        $names = array("Joseff", "Keanu Reeves" , "Andrew" , "York Rasuff" , "Indiana Jones");
        
        ($names[array_rand($names)]);


        $this->Sales->qtd = ($names[array_rand($names)]);
        $this->Sales->product = ($names[array_rand($names)]);
        $this->Sales->salesman = ($names[array_rand($names)]);
        $this->Sales->uni_product_price = ($names[array_rand($names)]);
        $this->Sales->total_amount_price = ($names[array_rand($names)]);
        $this->Sales->sale_date = ($names[array_rand($names)]);
        $this->Sales->save();

    }

    public function checkSession(){
        if(session()->get('userinfo')[0]['email'] == null){
           return "logout";  
        }
    }
}
