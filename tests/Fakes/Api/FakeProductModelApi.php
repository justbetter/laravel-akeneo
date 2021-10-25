<?php

namespace JustBetter\Akeneo\Tests\Fakes\Api;

use Illuminate\Support\LazyCollection;

class FakeProductModelApi
{
    public function create(string $code, array $data = []): int
    {
        //
    }

    public function get(string $code): array
    {
        //
    }

    public function listPerPage(int $limit = 10, bool $withCount = false, array $queryParameters = [])
    {
        //
    }

    public function all(int $pageSize = 10, array $queryParameters = [])
    {
        return LazyCollection::times($pageSize, function () {
            return ['code' => '::test::'];
        });
    }

    public function upsert(string $code, array $data = []): int
    {
        //
    }

    public function upsertList($resources): \Traversable
    {
        //
    }
}
