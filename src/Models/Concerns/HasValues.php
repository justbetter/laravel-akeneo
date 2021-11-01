<?php

namespace JustBetter\Akeneo\Models\Concerns;

trait HasValues
{
    public function setValue(string $key, mixed $data): static
    {
        $values = $this['values'];
        $values[$key][0]['data'] = $data;
        $this['values'] = $values;

        return $this;
    }
}
