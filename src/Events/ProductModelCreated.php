<?php

namespace JustBetter\Akeneo\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductModelCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected array $event;

    public function __construct(array $event)
    {
        $this->event = $event;
    }
}
