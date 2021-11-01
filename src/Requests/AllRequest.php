<?php

namespace JustBetter\Akeneo\Requests;

use Illuminate\Support\Collection;

abstract class AllRequest
{
    public static function request(): self
    {
        return new static();
    }

    abstract public function send(): Collection;
}
