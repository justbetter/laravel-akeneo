<?php

namespace JustBetter\Akeneo\Requests\Attribute;

use Akeneo\Pim\ApiClient\Exception\NotFoundHttpException;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\Attribute;
use JustBetter\Akeneo\Requests\FindRequest;

class Find extends FindRequest
{
    public function send(): ?Attribute
    {
        try {
            $product = Akeneo::getAttributeApi()->get($this->code);
        } catch (NotFoundHttpException $e) {
            return null;
        }

        $model = config('akeneo.models.attribute');

        return new $model($product);
    }
}
