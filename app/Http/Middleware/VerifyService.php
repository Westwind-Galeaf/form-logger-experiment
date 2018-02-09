<?php

namespace App\Http\Middleware;

use Closure;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;

class VerifyService
{
    use ProvidesConvenienceMethods;

    private $rules = [
        'key' => 'required|exists:services,key'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->validate($request, $this->rules);

        return $next($request);
    }
}
