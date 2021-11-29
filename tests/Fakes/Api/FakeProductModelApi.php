<?php

namespace JustBetter\Akeneo\Tests\Fakes\Api;

use Akeneo\Pim\ApiClient\Exception\NotFoundHttpException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\LazyCollection;

class FakeProductModelApi
{
    public static array $upsert = [];

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
            'family' => 'products',
            'values' => [
                'product_name' => [
                    [
                        'scope' => null,
                        'locale' => null,
                        'data' => 'test product',
                    ],
                ],
            ],
        ];
    }

    public function listPerPage(int $limit = 10, bool $withCount = false, array $queryParameters = [])
    {
        //
    }

    public function all(int $pageSize = 10, array $queryParameters = [])
    {
        return LazyCollection::times($pageSize, function () {
            return [
                'code' => '::test::',
                'family' => 'products',
                'values' => [
                    'product_name' => [
                        [
                            'scope' => null,
                            'locale' => null,
                            'data' => 'test product',
                        ],
                    ],
                ],
            ];
        });
    }

    public function upsert(string $code, array $data = []): int
    {
        self::$upsert['code'] = $code;
        self::$upsert['data'] = $data;

        return true;
    }

    public function upsertList($resources): \Traversable
    {
        //
    }

    public static function setUp(): void
    {
        self::$upsert = [];
    }
}
