<?php

namespace JustBetter\Akeneo\Requests;

use Illuminate\Support\LazyCollection;

abstract class LazyRequest
{
    public static function request(): self
    {
        return new static();
    }

    abstract public function send(): LazyCollection;
}
