<?php

namespace JustBetter\Akeneo\Tests\Fakes\Api;

use Akeneo\Pim\ApiClient\Exception\NotFoundHttpException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\LazyCollection;

class FakeChannelApi
{
    public array $all = [];
    public array $upsert = [];
    public string $delete = '';

    public function create(string $code, array $data = []): int
    {
        //
    }

    public function get(string $code): array
    {
        if ($code !== 'test') {
            throw new NotFoundHttpException('test', new Request('GET', '/'), new Response());
        }

        return [
            'code' => 'test',
            'currencies'    => [
                'EUR',
                'USD',
            ],
            'locales'     => [
                'nl_NL',
                'de_DE',
                'en_US',
            ],
            'category_tree' => 'master',
            'conversion_units'     => [
                'weight' => 'KILOGRAM',
            ],
            'labels'     => [
                'nl_NL' => 'Test nl_NL',
                'de_DE' => 'Test de_DE',
                'en_US' => 'Test en_US',
            ],

        ];
    }

    public function listPerPage(int $limit = 10, bool $withCount = false, array $queryParameters = [])
    {
        //
    }

    public function all(int $pageSize = 10, array $queryParameters = [])
    {
        $this->all['query'] = $queryParameters;

        return LazyCollection::times($pageSize, function () {
            return ['code' => '::test::'];
        });
    }

    public function delete(string $code): int
    {
        $this->delete = $code;

        return (int) ($code === 'test');
    }

    public function upsertList($resources): \Traversable
    {
        //
    }
}
