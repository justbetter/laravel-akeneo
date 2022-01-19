<?php

namespace JustBetter\Akeneo\Builders;

use Akeneo\Pim\ApiClient\Search\SearchBuilder;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Akeneo;
use JustBetter\Akeneo\Exceptions\ModelNotFoundException;
use JustBetter\Akeneo\Models\ApiModel;
use JustBetter\Akeneo\Requests\AllRequest;

class QueryBuilder
{
    protected SearchBuilder $searchBuilder;

    public function __construct(
        protected ApiModel $model
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

    public function lazy(): LazyCollection
    {
        $class = $this->model::guessApiNamespace('Lazy');

        return $class::request()->send();
    }

    public function find(string $code): ?ApiModel
    {
        $class = $this->model::guessApiNamespace('Find');

        return $class::request($code)->send();
    }

    public function findOrFail(string $code): ApiModel
    {
        $model = $this->find($code);

        if (! $model) {
            throw new ModelNotFoundException(
                __('No results for code ":code"', ['code' => $code])
            );
        }

        return $model;
    }

    public function first(): ApiModel
    {
        return $this
            ->get()
            ->first();
    }
}
