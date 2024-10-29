<?php

namespace App\Events;



use App\Models\CommentReplay;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReplayUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $replay;

    public function __construct(CommentReplay $replay)
    {
        $this->replay = $replay;
    }

    public function broadcastOn()
    {
        return ['replay-updated'];
    }
}
