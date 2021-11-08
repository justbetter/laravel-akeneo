<?php

namespace JustBetter\Akeneo\Requests\Product;

use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\DeleteRequest;

class Delete extends DeleteRequest
{
    public function send(): bool
    {
        return (bool) Akeneo::getProductApi()->delete($this->code);
    }
}
