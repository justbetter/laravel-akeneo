<?php

return [
    'models' => [
        'product_model' => \JustBetter\Akeneo\Models\ProductModel::class,
        'product' => \JustBetter\Akeneo\Models\Product::class,
    ],

    'connections' => [
        'default' => [
            'url' => env('AKENEO_URL'),
            'client_id' => env('AKENEO_CLIENT_ID'),
            'secret' => env('AKENEO_SECRET'),
            'username' => env('AKENEO_USERNAME'),
            'password' => env('AKENEO_PASSWORD'),
        ],
    ],

    'events_secret' => env('AKENEO_EVENTS_SECRET'),

    'cache_ttl' => 30,
];
