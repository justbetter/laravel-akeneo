<?php

namespace JustBetter\Akeneo\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

abstract class AkeneoEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public array $event
    )
    {
    }
}
