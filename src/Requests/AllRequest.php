<?php

namespace JustBetter\Akeneo\Requests;

use Illuminate\Support\Collection;

abstract class AllRequest
{
    protected array $filters = [];

    public static function request(): self
    {
        return new static();
    }

    public function withFilters(array $filters): static
    {
        $this->filters = $filters;

        return $this;
    }

    abstract public function send(): Collection;
}
