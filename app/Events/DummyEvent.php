<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class DummyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    protected $userName;

    public function __construct($userName)
    {
        $this->userName = $userName;
    }

    public function broadcastWith()
    {
        $data = [
            'user_name' => $this->userName,
            'timestamp' => now(),
        ];

        return $data;
    }
    public function broadcastOn()
    {
        return new Channel('dummy-channel');
    }
}
