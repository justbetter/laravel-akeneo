<?php

namespace JustBetter\Akeneo\Requests\Product;

use Akeneo\Pim\ApiClient\Exception\NotFoundHttpException;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\Product;
use JustBetter\Akeneo\Requests\DeleteRequest;
use JustBetter\Akeneo\Requests\FindRequest;

class Delete extends DeleteRequest
{
    public function send(): bool
    {
        return (bool)Akeneo::getProductApi()->delete($this->code);
    }
}
