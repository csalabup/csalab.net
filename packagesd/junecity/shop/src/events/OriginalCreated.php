<?php

namespace junecity\shop\events;

use junecity\shop\events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use junecity\shop\models\Original;

class OriginalCreated extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $original;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($original)
    {
        $this->original = $original;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['test-channel'];
    }
}
