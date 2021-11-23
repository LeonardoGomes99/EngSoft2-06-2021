<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'password' => 'As suas credenciais estão incorretas. Tente novamente.'
            ]);
        }

        session()->regenerate();

        return redirect(route('index'))->with('success', 'Bem vindo!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->action([GeneralController::class, 'index'])->with('success', 'Adeus!');
    }
}
