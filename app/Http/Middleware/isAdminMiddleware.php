<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAdminMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {

            if (Auth::user()->is_admin == 1) {

                return $next($request);

            }else{
                Abort(403);
            }


        }else{

            return redirect()->back()->with('status','you should log in');
        }
    }
}
