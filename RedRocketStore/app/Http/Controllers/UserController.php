<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;


class UserController extends Controller
{
    public function __construct(Users $Users)
    {
        $this->Users = $Users;
    }

    public function index(){
        return view('create_employee');
    }

    public function storeUser(Request $request){
        $this->Users->name = $request->nome;
        $this->Users->cpf = $request->cpf;
        $this->Users->birthdate = $request->dataNasc;
        $this->Users->gender = $request->genero;
        $this->Users->email = $request->email;
        $this->Users->job = $request->cargo;
        $this->Users->password = $request->senha;
        $this->Users->email_verified_at = $request->dataNasc;
        $this->Users->save();
        return response()->json(['message' => '/dashboard'], 200);

    }
}
