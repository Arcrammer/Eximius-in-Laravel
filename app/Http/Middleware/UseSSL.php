<?php

namespace App\Http\Middleware;

use Closure;

class UseSSL
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
      if (!$request->secure()) {
        // The request wasn't over HTTPS, so
        // we'll send the user through HTTPS
        return redirect()->secure($request->getRequestUri());
      }
      return $next($request);
    }
}
