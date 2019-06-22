<?php

namespace TheNandan\TheLogger\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Log;

class TheRequestLoggerEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $request;
    private $response;
    private $startedAt;
    private $returnedAt;

    /**
     * TheRequestLoggerEvent constructor.
     *
     * @param $request
     * @param $response
     * @param $startedAt
     * @param $returnedAt
     */
    public function __construct($request, $response, $startedAt, $returnedAt)
    {
        $this->request = $request;
        $this->response = $response;
        $this->startedAt = $startedAt;
        $this->returnedAt = $returnedAt;
        Log::info('Event Triggered');
    }
}
