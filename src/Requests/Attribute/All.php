<?php

namespace JustBetter\Akeneo\Requests\Attribute;

use Illuminate\Support\Collection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\AllRequest;

class All extends AllRequest
{
    public function send(): Collection
    {
        return cache()->remember('akeneo_attribute_all', config('akeneo.cache_ttl', 0), function () {
            $models = [];

            $items = Akeneo::getAttributeApi()->all(50);

            foreach ($items as $item) {
                $model = \JustBetter\Akeneo\Akeneo::getAttributeTypeClass($item['type']);

                $models[] = new $model($item);
            }

            return $model::newCollection($models);
        });
    }
}
