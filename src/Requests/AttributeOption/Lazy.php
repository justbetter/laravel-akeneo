<?php

namespace JustBetter\Akeneo\Requests\AttributeOption;

use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\LazyRequest;

class Lazy extends LazyRequest
{
    public function send(): LazyCollection
    {
        $model = config('akeneo.models.channel');

        return LazyCollection::make(function () use ($model) {
            $items = Akeneo::getAttributeOptionApi()->all(50);

            foreach ($items as $item) {
                yield new $model($item);
            }
        });
    }
}
