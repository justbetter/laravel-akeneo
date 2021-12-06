<?php

namespace JustBetter\Akeneo\DataObjects;

use Illuminate\Contracts\Support\Arrayable;

class Option implements Arrayable
{
    public string $hash;

    public function __construct(
        public mixed $data,
        public ?string $locale = null,
        public ?string $scope = null
    ) {
        $this->hash = md5($this->data.$this->locale.$this->scope);
    }

    public static function make(mixed $data, ?string $locale = null, ?string $scope = null): static
    {
        return new static($data, $locale, $scope);
    }

    public function is(self $option): bool
    {
        return $this->hash === $option->hash;
    }

    public function toArray(): array
    {
        return [
            'data' => $this->data,
            'locale' => $this->locale,
            'scope' => $this->scope,
        ];
    }
}
