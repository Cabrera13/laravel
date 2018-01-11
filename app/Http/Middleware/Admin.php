<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin {
  public function handle(Request $request, Closure $next)
  {   
    //si no esta loguejat, return to login
    if (Auth::check()) {
    // si esta loguejat pero no te permis de admin
        if(Auth::user()->isAdmin()){
          return $next($request);
        }
        else {
          return abort(401, 'Unauthorized action.');
        }
    }
    return redirect('login');
  }
}