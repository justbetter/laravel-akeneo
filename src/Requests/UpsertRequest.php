<?php

namespace JustBetter\Akeneo\Requests;

abstract class UpsertRequest
{
    public function __construct(
        protected string $code
    ) {
    }

    public static function request(string $code): self
    {
        return new static($code);
    }

    abstract public function send(array $data): bool;
}
