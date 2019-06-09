<?php

namespace TheNandan\TheLogger\Http\Middleware;

use TheNandan\TheLogger\Models\TheRequestLog;
use Carbon\Carbon;
use Closure;

class TheRequestLogger
{
    /**
     * @var $startTime
     */
    private $startTime;

    /**
     * @var $startDateTime
     */
    protected $startDateTime;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->startTime = microtime(true);
        $this->startDateTime = Carbon::now()->toDateTimeString();

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
        if (env('THE_REQUEST_LOGGER_ENABLED')) {
            $newLog = new TheRequestLog();
            $newLog->start_micro_time = $this->startTime;
            $newLog->end_micro_time = microtime(true);
            $newLog->started_at = $this->startDateTime;
            $newLog->returned_at = Carbon::now()->toDateTimeString();
            $newLog->ip_address = $request->ip();
            $newLog->url = $request->fullUrl();
            $newLog->method = $request->method();
            $newLog->input = $request->getContent();
            $newLog->output = $response->getContent();
            $newLog->save();
        }
    }
}
