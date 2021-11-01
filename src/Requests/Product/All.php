<?php

namespace JustBetter\Akeneo\Requests\Product;

use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\Product;
use JustBetter\Akeneo\Requests\AllRequest;

class All extends AllRequest
{
    public function send(): LazyCollection
    {
        return LazyCollection::make(function () {
            $productModels = Akeneo::getProductApi()->all(50);

            foreach ($productModels as $productModel) {
                yield new Product($productModel);
            }
        });
    }
}
