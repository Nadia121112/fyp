<?php

namespace App\Http\Middleware;

use Closure;

class PensyarahAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->role == 'pensyarah' || $request->user()->role == 'admin') {
            return $next($request);
        }

        session()->flash('message', 'You dont have permission!');

        return back();
    }
}
