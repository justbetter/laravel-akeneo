<?php

namespace JustBetter\Akeneo\Models;

class Attribute extends ApiModel
{
    public string $primaryKey = 'code';

    protected array $selected = [];

    public function getSelected(): array
    {
        return $this->selected;
    }
}
