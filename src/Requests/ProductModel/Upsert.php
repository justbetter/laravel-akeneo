<?php

namespace JustBetter\Akeneo\Requests\ProductModel;

use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\UpsertRequest;

class Upsert extends UpsertRequest
{
    public function send(array $data): bool
    {
        $productModel = Akeneo::getProductModelApi()->upsert($this->code, $data);

        return true;
    }
}
