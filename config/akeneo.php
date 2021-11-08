<?php

return [
    'models' => [
        'product_model' => \JustBetter\Akeneo\Models\ProductModel::class,
        'product'       => \JustBetter\Akeneo\Models\Product::class,
        'attribute'     => \JustBetter\Akeneo\Models\Attribute::class,
    ],

    'connections' => [
        'default' => [
            'url'       => env('AKENEO_URL'),
            'client_id' => env('AKENEO_CLIENT_ID'),
            'secret'    => env('AKENEO_SECRET'),
            'username'  => env('AKENEO_USERNAME'),
            'password'  => env('AKENEO_PASSWORD'),
        ],
    ],

    'cache_ttl' => 30,
];
