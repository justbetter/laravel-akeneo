<?php

namespace JustBetter\Akeneo\Requests\Attribute;

use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\UpsertRequest;

class Upsert extends UpsertRequest
{
    public function send(array $data): bool
    {
        Akeneo::getAttributeApi()->upsert($this->code, $data);

        return true;
    }
}
