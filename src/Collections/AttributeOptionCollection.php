<?php

namespace JustBetter\Akeneo\Collections;

use Illuminate\Support\Collection;
use JustBetter\Akeneo\Models\Attribute;
use JustBetter\Akeneo\Models\AttributeOption;

class AttributeOptionCollection extends Collection
{
    public Attribute $attribute;

    public function withAttribute(Attribute $attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }

    public function create(AttributeOption $option)
    {
        return AttributeOption::create($this->attribute->getPrimaryKey(), $option->toArray());
    }
}
