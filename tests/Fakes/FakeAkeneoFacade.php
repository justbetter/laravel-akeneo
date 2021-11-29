<?php

namespace JustBetter\Akeneo\Tests\Fakes;


use Illuminate\Support\Str;

class FakeAkeneoFacade
{
    public function __call(string $name, array $arguments): mixed
    {
        $class = '\\JustBetter\\Akeneo\\Tests\\Fakes\\Api\\'.Str::of($name)->replace('get', 'Fake');

        return new $class();
    }
}
