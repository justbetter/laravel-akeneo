<?php

namespace JustBetter\Akeneo\Requests\ProductModel;

use Illuminate\Support\Collection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\AllRequest;

class All extends AllRequest
{
    public function send(): Collection
    {
        return cache()->remember('akeneo_product_model_all', config('akeneo.cache_ttl', 0), function () {
            $models = [];

            $productModels = Akeneo::getProductModelApi()->all(50);

            $model = config('akeneo.models.product_model');

            foreach ($productModels as $productModel) {
                $models[] = new $model($productModel);
            }

            return $model::newCollection($models);
        });
    }
}
