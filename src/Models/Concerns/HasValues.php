<?php

namespace JustBetter\Akeneo\Models\Concerns;

trait HasValues
{
    public function setValue(mixed $data, ?string $locale = null, ?string $scope = null): void
    {
        $items = collect($this->selected)
            ->where('locale', '!=', $locale)
            ->where('scope', '!=', $scope)
            ->all();

        $items[] = [
            'locale' => $locale,
            'scope'  => $scope,
            'data' => $data,
        ];

        $this->selected = $items;
    }
}
