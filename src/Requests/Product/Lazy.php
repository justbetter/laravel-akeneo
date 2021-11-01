<?php

namespace JustBetter\Akeneo\Requests\Product;

use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\LazyRequest;

class Lazy extends LazyRequest
{
    public function send(): LazyCollection
    {
        $model = config('akeneo.models.product');

        return LazyCollection::make(function () use ($model) {
            $products = Akeneo::getProductApi()->all(50);

            foreach ($products as $product) {
                yield new $model($product);
            }
        });
    }
}
