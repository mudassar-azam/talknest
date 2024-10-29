<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessageSent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $fromId;
    public $toId;
    public $message;
    public $attachment;

    public function __construct($fromId, $toId, $message)
    {
        $this->fromId = $fromId;
        $this->toId = $toId;
        $this->message = $message;
        // $this->attachment = $attachment;
    }

    public function broadcastOn()
    {
        return new Channel('chat'); // Broadcasting on a 'chat' channel
    }


}
