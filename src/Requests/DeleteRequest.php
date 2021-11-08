<?php

namespace JustBetter\Akeneo\Requests;

abstract class DeleteRequest
{
    public function __construct(
        protected string $code
    ) {
    }

    public static function request(string $code): self
    {
        return new static($code);
    }

    abstract public function send(): bool;
}
