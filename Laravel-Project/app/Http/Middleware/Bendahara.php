<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Bendahara
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and has 'Bendahara' user_type
        if ($request->user() && $request->user()->user_type === 'Bendahara') {
            return $next($request);
        }

        // Redirect to home or show an error page, adjust as needed
        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}