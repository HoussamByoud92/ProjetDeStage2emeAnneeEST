<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // admin == 1
        // user == 0
        if(Auth::check()){

            
                if(Auth::user()->is_admin == '1'){

                    return $next($request);

                }else{

                    return redirect('/')->with('message','Vous n`avez pas l`autorisation pour effectuer l`opération');

                }

        }else{

            return redirect('/login')->with('message','Veuillez vous authentifier pour effectuer les operations');

        }
        return $next($request);
    }
}
