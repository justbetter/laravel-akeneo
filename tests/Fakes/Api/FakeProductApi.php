<?php

namespace JustBetter\Akeneo\Tests\Fakes\Api;

use Akeneo\Pim\ApiClient\Exception\NotFoundHttpException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\LazyCollection;

class FakeProductApi
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
            'identifier' => 'test',
            'enabled'    => true,
            'family'     => 'stadsfietsen',
            'categories' => [],
            'groups'     => [],
            'parent'     => null,

            'values' => [
                'product_name' => [
                    [
                        'locale' => 'nl_NL',
                        'scope'  => 'magento',
                        'data'   => 'testing product',
                    ],
                ],
            ],

            'created' => '2021-11-08T13:10:42+01:00',
            'updated' => '2021-11-08T13:10:53+01:00',

            'associations'            => [
                'UPSELL' => [
                    'products'       => [],
                    'product_models' => [],
                    'groups'         => [],
                ],

                'X_SELL' => [
                    'products'       => [],
                    'product_models' => [],
                    'groups'         => [],
                ],

                'SUBSTITUTION' => [
                    'products'       => [],
                    'product_models' => [],
                    'groups'         => [],
                ],
            ],
            'quantified_associations' => [],
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

    public function upsert(string $code, array $data = []): int
    {
        $this->upsert['code'] = $code;
        $this->upsert['data'] = $data;

        return true;
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
