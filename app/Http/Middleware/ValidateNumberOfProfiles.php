<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateNumberOfProfiles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $nProfiles = $request->route('nProfiles');
        if($nProfiles < 1 || $nProfiles > 15) {
            return response()->json([
                'error' => 'Invalid number of profiles: ' . $nProfiles. ' (1-15)'
            ], 400);
        }
        return $next($request);
    }
}
