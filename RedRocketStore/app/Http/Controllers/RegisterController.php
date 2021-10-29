<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'cpf' => 'required|unique:users',
            'gender' => 'required',
            'birthdate' => 'required|date',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|max:255',
            'job' => 'required',
        ]);

        auth()->login(User::create($attributes));

        return redirect(route('index'))->with('success', 'A conta foi criada com sucesso.');
    }

    public function show($post)
    {
        return View('register/'.$post);
    }
}
