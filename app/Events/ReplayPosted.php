<?php

namespace App\Events;

use App\Models\CommentReplay;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReplayPosted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $replay;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\CommentReplay  $replay
     * @return void
     */
    public function __construct(CommentReplay $replay)
    {
        $this->replay = $replay;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {

        return new PrivateChannel('CommentReplay.' . $this->replay->id);
    }
}

