<?php

namespace JustBetter\Akeneo\Requests\ProductModel;

use Akeneo\Pim\ApiClient\Exception\NotFoundHttpException;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\ProductModel;
use JustBetter\Akeneo\Requests\FindRequest;

class Find extends FindRequest
{
    public function send(): ?ProductModel
    {
        try {
            $productModel = Akeneo::getProductModelApi()->get($this->code);
        } catch (NotFoundHttpException $e) {
            return null;
        }

        return new ProductModel($productModel);
    }
}
