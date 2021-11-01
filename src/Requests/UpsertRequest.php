<?php

namespace JustBetter\Akeneo\Requests;

abstract class UpsertRequest
{
    protected string $code;

    public function __construct(string $code)
    {
        $this->code = $code;
    }

    public static function request(string $code): self
    {
        return new static($code);
    }

    abstract public function send(array $data): bool;
}