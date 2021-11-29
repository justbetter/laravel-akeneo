<?php

namespace JustBetter\Akeneo\Requests\Attribute;

use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\LazyRequest;

class Lazy extends LazyRequest
{
    public function send(): LazyCollection
    {
        return LazyCollection::make(function () {
            $attributes = Akeneo::getAttributeApi()->all(50);

            foreach ($attributes as $item) {
                $model = \JustBetter\Akeneo\Akeneo::getAttributeTypeClass($item['type']);

                yield new $model($item);
            }
        });
    }
}
