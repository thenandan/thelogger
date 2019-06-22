<?php

namespace TheNandan\TheLogger\Http\Middleware;

use TheNandan\TheLogger\Models\TheRequestLog;
use Carbon\Carbon;
use Closure;

class TheRequestLogger
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    /**
     * Handle the action when response has been prepared.
     *
     * @param $request
     * @param $response
     */
    public function terminate($request, $response)
    {
        if (config('thelogger.logger_enabled')) {
            $responseTime = Carbon::now();
            $requestTime  = Carbon::createFromTimestamp(LARAVEL_START);
            $newLog = new TheRequestLog();
            $newLog->start_micro_time = $requestTime->timestamp;
            $newLog->end_micro_time = $responseTime->timestamp;
            $newLog->started_at = $requestTime->toDateTimeString();
            $newLog->returned_at = $responseTime->toDateTimeString();
            $newLog->ip_address = $request->ip();
            $newLog->url = $request->fullUrl();
            $newLog->method = $request->method();
            $newLog->input = $request->getContent();
            $newLog->output = $response->getContent();
            $newLog->save();
        }
    }
}
