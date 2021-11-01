<?php

namespace JustBetter\Akeneo\Requests\Product;

use Illuminate\Support\Collection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\AllRequest;

class All extends AllRequest
{
    public function send(): Collection
    {
        return cache()->remember('akeneo_product_all', config('akeneo.cache_ttl', 0), function () {
            $models = [];

            $productModels = Akeneo::getProductApi()->all(50);

            $model = config('akeneo.models.product');

            foreach ($productModels as $productModel) {
                $models[] = new $model($productModel);
            }

            return $model::newCollection($models);
        });
    }
}
