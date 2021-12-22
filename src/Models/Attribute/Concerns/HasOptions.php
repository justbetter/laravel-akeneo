<?php

namespace JustBetter\Akeneo\Models\Attribute\Concerns;

use JustBetter\Akeneo\Collections\AttributeOptionCollection;
use JustBetter\Akeneo\DataObjects\Option;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\Attribute\Simpleselect;
use JustBetter\Akeneo\Models\AttributeOption;

trait HasOptions
{
    public ?AttributeOptionCollection $options = null;

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
     * @param  Option[]  $options
     */
    public function syncOptions(array $options): static
    {
        $this->selected = $options;

        return $this;
    }

    public function options(): AttributeOptionCollection
    {
        if ($this->options) {
            return $this->options;
        }

        $options = Akeneo::getAttributeOptionApi()->all($this->getPrimaryKey(), 50);

        return AttributeOptionCollection::make($options)->withAttribute($this)->mapInto(AttributeOption::class);
    }

    public function refreshOptions(): AttributeOptionCollection
    {
        $this->options = null;

        return $this->options();
    }
}
