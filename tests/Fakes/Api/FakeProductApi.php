<?php

namespace JustBetter\Akeneo\Tests\Fakes\Api;

use Akeneo\Pim\ApiClient\Exception\NotFoundHttpException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\LazyCollection;

class FakeProductApi
{
    public static array $all = [];
    public static array $upsert = [];
    public static string $delete = '';

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
                        'locale' => null,
                        'scope'  => null,
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
        self::$all['query'] = $queryParameters;

        return LazyCollection::times($pageSize, function () {
            return [
                'identifier' => '::test::',
                'enabled'    => true,
                'family'     => 'stadsfietsen',
                'categories' => [],
                'groups'     => [],
                'parent'     => null,

                'values' => [
                    'product_name' => [
                        [
                            'locale' => null,
                            'scope'  => null,
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
        });
    }

    public function upsert(string $code, array $data = []): int
    {
        self::$upsert['code'] = $code;
        self::$upsert['data'] = $data;

        return true;
    }

    public function delete(string $code): int
    {
        self::$delete = $code;

        return (int) ($code === 'test');
    }

    public function upsertList($resources): \Traversable
    {
        //
    }

    public static function setUp(): void
    {
        self::$upsert = [];
        self::$delete = '';
        self::$all = [];
    }
}
