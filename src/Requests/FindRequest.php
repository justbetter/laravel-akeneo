<?php

namespace JustBetter\Akeneo\Requests;

abstract class FindRequest
{
    public function __construct(
        protected string $code
    ) {
    }

    public static function request(string $code): self
    {
        return new static($code);
    }

    abstract public function send();
}
