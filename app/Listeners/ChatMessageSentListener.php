<?php

namespace App\Listeners;

use App\Models\Chat;
use App\Events\ChatMessageSent;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChatMessageSentListener
{
    public function handle(ChatMessageSent $event)
    {
        // Code to store message in the database
        $chat = new Chat();
        $chat->from_id = $event->fromId;
        $chat->to_id = $event->toId;
        $chat->body = $event->message;
        // $chat->attachment = $event->attachment;
        $chat->save();
    }
}
