<?php

namespace junecity\shop\events;

use junecity\shop\events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use junecity\shop\models\Original;

class EditImage extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $original;
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($original, $user)
    {
        $this->original = $original;
        $this->user = $user;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        $user = $this->user;
        
        return [$user->id];
    }
}
