<?php

namespace JustBetter\Akeneo\Requests\ProductModel;

use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\ProductModel;
use JustBetter\Akeneo\Requests\AllRequest;

class All extends AllRequest
{
    public function send(): LazyCollection
    {
        return LazyCollection::make(function () {
            $productModels = Akeneo::getProductModelApi()->all(50);

            foreach ($productModels as $productModel) {
                yield new ProductModel($productModel);
            }
        });
    }
}
