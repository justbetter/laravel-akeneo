<?php

namespace JustBetter\Akeneo\Models;

use Illuminate\Support\Collection;
use JustBetter\Akeneo\Models\Concerns\Api\HasLazy;

class AttributeOption extends ApiModel
{
    use HasLazy;

    public string $primaryKey = 'code';

    protected array $selected = [];

    public static function all(string $attributeCode): Collection
    {
        $class = self::guessApiNamespace('All');

        return $class::request()->forAttribute($attributeCode)->send();
    }

    public static function create(string $attributeCode, string $code, array $labels, int $sortOrder = 0): Collection
    {
        $class = self::guessApiNamespace('Upsert');

        return $class::request($code)->forAttribute($attributeCode)->send([
            'sort_order' => $sortOrder,
            'labels' => $labels,
        ]);
    }
}
