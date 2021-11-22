<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $admin = "ad@min.com";
        if(auth()->user()->email == $admin){
        return $next($request);
        }
        return redirect('index')->with('error','Acesso negado. Você não possui permissões administrativas. Entre em contato com '.$admin.', o administrador atual:');
    }
}
