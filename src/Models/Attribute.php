<?php

namespace JustBetter\Akeneo\Models;

use Illuminate\Support\Collection;
use JustBetter\Akeneo\Models\Concerns\Api\HasAll;
use JustBetter\Akeneo\Models\Concerns\Api\HasFind;
use JustBetter\Akeneo\Models\Concerns\Api\HasLazy;

class Attribute extends ApiModel
{
    use HasFind;
    use HasLazy;
    use HasAll;

    public string $primaryKey = 'code';

    protected array $selected = [];

    public function getSelected(): array
    {
        return $this->selected;
    }

    public static function all(): Collection
    {
        $class = self::guessApiNamespace('All');

        return $class::request()->send();
    }
}
