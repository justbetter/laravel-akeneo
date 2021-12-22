<?php

namespace JustBetter\Akeneo\Builders;

use Akeneo\Pim\ApiClient\Search\SearchBuilder;
use Illuminate\Support\Collection;
use JustBetter\Akeneo\Akeneo;
use JustBetter\Akeneo\Models\ApiModel;
use JustBetter\Akeneo\Models\AttributeOption;
use JustBetter\Akeneo\Requests\AllRequest;

class QueryBuilder
{
    public function __construct(
        protected ApiModel $model,
        protected ?SearchBuilder $searchBuilder = null
    ) {
        $this->searchBuilder = new SearchBuilder;
    }

    public function where(string $column, mixed $operator = null, mixed $value = null): self
    {
        if (is_null($value)) {
            $value = $operator;
            $operator = '=';
        }

        $this->searchBuilder->addFilter($column, $operator, $value);

        return $this;
    }

    public function get(): Collection
    {
        /** @var AllRequest $class */
        $class = Akeneo::getRequestClass('All', $this->model);

        return $class::request()
            ->withFilters(
                $this->searchBuilder->getFilters()
            )
            ->send();
    }

    public function first(): ApiModel
    {
        return $this
            ->get()
            ->first();
    }
}
