<?php

namespace App\Http\Middleware;

use App\Jobs\LogRequestJob;
use Closure;
use Illuminate\Http\Request;

class LogRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Process the request
        $response = $next($request);

        // Prepare log data
        $logData = [
            'method'      => $request->method(),
            'path'        => $request->path(),
            'ip'          => $request->ip(),
            'agent'       => $request->header('User-Agent'),
            'status_code' => $response->getStatusCode(),
            'request'     => json_encode($request->all()),
            // Optionally capture route parameters if they exist
            'gender'      => $request->route('gender') ?? 'unspecified',
            'nProfiles'   => $request->route('nProfiles') ?? 1,
        ];

        LogRequestJob::dispatch($logData);

        return $response;
    }
}
