<?php

namespace JustBetter\Akeneo\Models\Attribute\Concerns;

use JustBetter\Akeneo\Models\Attribute\Simpleselect;
use JustBetter\Akeneo\DataObjects\Option;

trait HasOptions
{
    public function addOption(Option $option): static
    {
        if ($this instanceof Simpleselect) {
            return $this->syncOptions([$option]);
        }

        $this->selected = collect($this->selected)
            ->reject->is($option)
            ->add($option)
            ->all();

        return $this;
    }

    public function removeOption(Option $option): static
    {
        $this->selected = collect($this->selected)
            ->reject->is($option)
            ->all();

        return $this;
    }

    /**
     * @param Option[] $options
     */
    public function syncOptions(array $options): static
    {
        $this->selected = $options;

        return $this;
    }
}
