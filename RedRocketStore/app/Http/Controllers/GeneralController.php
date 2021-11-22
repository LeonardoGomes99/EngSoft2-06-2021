<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    public function index()
    {
        if (Auth::guest()) {
            return view('sessions.create');
        } else {
            return redirect()->action(
                [GeneralController::class, 'show'],
                ['page' => 'dashboard']
            );
        }
    }

    public function show($value)
    {
        # The big dumb
        return view('dashboard', [
            'products' => DB::table('products')->paginate(20)
        ]);
    }
}
