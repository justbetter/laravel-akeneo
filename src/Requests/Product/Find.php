<?php

namespace JustBetter\Akeneo\Requests\Product;

use Akeneo\Pim\ApiClient\Exception\NotFoundHttpException;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\Product;
use JustBetter\Akeneo\Requests\FindRequest;

class Find extends FindRequest
{
    public function send(): ?Product
    {
        try {
            $product = Akeneo::getProductApi()->get($this->code);
        } catch (NotFoundHttpException $e) {
            return null;
        }

        $model = config('akeneo.models.product');

        return new $model($product);
    }
}
