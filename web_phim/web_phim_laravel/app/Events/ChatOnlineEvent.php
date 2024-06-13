<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatOnlineEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ten_user;
    public $content;
    public $date;
    public function __construct($ten_user, $content, $date)
    {
        $this->ten_user = $ten_user;
        $this->content = $content;
        $this->date = $date;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('comments'),
        ];
    }
    public function broadcastAs()
    {
        return 'comment';
    }
}
