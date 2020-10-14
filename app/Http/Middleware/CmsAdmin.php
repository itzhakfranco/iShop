<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class CmsAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('is_admin')) {

            return redirect('user/signin');
        } else {

            return $next($request);
        }
    }
}
