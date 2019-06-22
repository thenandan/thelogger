<?php

namespace TheNandan\TheLogger\Http\Middleware;

use Jenssegers\Agent\Agent;
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
            $agent = new Agent();
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
            $newLog->browser = $agent->browser();
            $newLog->browser_version = $agent->version($agent->browser());
            $newLog->platform = $agent->platform();
            $newLog->platform_version = $agent->version($agent->platform());
            $newLog->device = $agent->device();
            $newLog->save();
        }
    }
}
