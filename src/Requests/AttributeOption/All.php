<?php

namespace JustBetter\Akeneo\Requests\AttributeOption;

use Illuminate\Support\Collection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\AllRequest;

class All extends AllRequest
{
    protected string $attributeCode;

    public function forAttribute(string $attributeCode)
    {
        $this->attributeCode = $attributeCode;

        return $this;
    }

    public function send(): Collection
    {
        return cache()->remember(
            'akeneo_attribute_option_all_'.json_encode($this->filters),
            config('akeneo.cache_ttl', 0),
            function () {
                $models = [];

                $items = Akeneo::getAttributeOptionApi()->all($this->attributeCode, 50, ['search' => $this->filters]);

                $model = config('akeneo.models.attribute_option');

                foreach ($items as $item) {
                    $models[] = new $model($item);
                }

                return $model::newCollection($models);
            });
    }
}
