<?php

namespace JustBetter\Akeneo\Requests\Attribute;

use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\UpsertRequest;

class Upsert extends UpsertRequest
{
    protected string $attributeCode;

    public function forAttribute(string $attributeCode)
    {
        $this->attributeCode = $attributeCode;

        return $this;
    }

    public function send(array $data): bool
    {
        Akeneo::getAttributeOptionApi()->upsert($this->attributeCode, $this->code, $data);

        return true;
    }
}
