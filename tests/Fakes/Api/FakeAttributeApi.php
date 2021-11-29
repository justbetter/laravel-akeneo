<?php

namespace JustBetter\Akeneo\Tests\Fakes\Api;

use Akeneo\Pim\ApiClient\Exception\NotFoundHttpException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\LazyCollection;

class FakeAttributeApi
{
    public static array $upsert = [];
    public static string $delete = '';

    public function create(string $code, array $data = []): int
    {
        //
    }

    public function get(string $code): array
    {
        if ($code == 'exception') {
            throw new NotFoundHttpException('test', new Request('GET', '/'), new Response());
        }

        return [
            'code'                   => $code,
            'type'                   => 'pim_catalog_text',
            'group'                  => 'marketing',
            'unique'                 => false,
            'useable_as_grid_filter' => true,
            'allowed_extensions'     => [],
            'metric_family'          => null,
            'default_metric_unit'    => null,
            'reference_data_name'    => null,
            'available_locales'      => [],
            'max_characters'         => null,
            'validation_rule'        => null,
            'validation_regexp'      => null,
            'wysiwyg_enabled'        => null,
            'number_min'             => null,
            'number_max'             => null,
            'decimals_allowed'       => null,
            'negative_allowed'       => null,
            'date_min'               => '2017-06-28T08:00:00',
            'date_max'               => '2017-08-08T22:00:00',
            'max_file_size'          => null,
            'minimum_input_length'   => null,
            'sort_order'             => 1,
            'localizable'            => false,
            'scopable'               => false,
            'labels'                 => [
                'en_US' => 'Sale date',
                'fr_FR' => 'Date des soldes',
            ],
            'guidelines'             => [
                'en_US' => 'Fill the release date for the summer sale 2017',
                'fr_FR' => 'Renseigner la date des soldes pour l\'été 2017',
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
                'code'                   => '::test::',
                'type'                   => 'pim_catalog_date',
                'group'                  => 'marketing',
                'unique'                 => false,
                'useable_as_grid_filter' => true,
                'allowed_extensions'     => [],
                'metric_family'          => null,
                'default_metric_unit'    => null,
                'reference_data_name'    => null,
                'available_locales'      => [],
                'max_characters'         => null,
                'validation_rule'        => null,
                'validation_regexp'      => null,
                'wysiwyg_enabled'        => null,
                'number_min'             => null,
                'number_max'             => null,
                'decimals_allowed'       => null,
                'negative_allowed'       => null,
                'date_min'               => '2017-06-28T08:00:00',
                'date_max'               => '2017-08-08T22:00:00',
                'max_file_size'          => null,
                'minimum_input_length'   => null,
                'sort_order'             => 1,
                'localizable'            => false,
                'scopable'               => false,
                'labels'                 => [
                    'en_US' => 'Sale date',
                    'fr_FR' => 'Date des soldes',
                ],
                'guidelines'             => [
                    'en_US' => 'Fill the release date for the summer sale 2017',
                    'fr_FR' => 'Renseigner la date des soldes pour l\'été 2017',
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
    }
}
