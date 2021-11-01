<?php

namespace JustBetter\Akeneo\Requests\ProductModel;

use Akeneo\Pim\ApiClient\Exception\NotFoundHttpException;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\ProductModel;
use JustBetter\Akeneo\Requests\FindRequest;
use JustBetter\Akeneo\Requests\UpsertRequest;

class Upsert extends UpsertRequest
{
    public function send(array $data): bool
    {
        $productModel = Akeneo::getProductModelApi()->upsert($this->code, $data);

        return true;
    }
}
