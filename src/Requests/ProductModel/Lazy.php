<?php

namespace JustBetter\Akeneo\Requests\ProductModel;

use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\LazyRequest;

class Lazy extends LazyRequest
{
    public function send(): LazyCollection
    {
        $model = config('akeneo.models.product_model');

        return LazyCollection::make(function () use ($model) {
            $productModels = Akeneo::getProductModelApi()->all(50);

            foreach ($productModels as $productModel) {
                yield new $model($productModel);
            }
        });
    }
}
