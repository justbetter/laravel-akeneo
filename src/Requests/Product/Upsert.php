<?php

namespace JustBetter\Akeneo\Requests\Product;

use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\UpsertRequest;

class Upsert extends UpsertRequest
{
    public function send(array $data): bool
    {
        Akeneo::getProductApi()->upsert($this->code, $data);

        return true;
    }
}
