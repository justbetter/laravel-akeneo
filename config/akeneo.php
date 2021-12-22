<?php

return [
    'models' => [
        'product_model'    => \JustBetter\Akeneo\Models\ProductModel::class,
        'product'          => \JustBetter\Akeneo\Models\Product::class,
        'attribute'        => \JustBetter\Akeneo\Models\Attribute::class,
        'attribute_option' => \JustBetter\Akeneo\Models\AttributeOption::class,
        'channel'          => \JustBetter\Akeneo\Models\Channel::class,

        'attribute_types' => [
            'Simpleselect' => \JustBetter\Akeneo\Models\Attribute\Simpleselect::class,
            'Multiselect'  => \JustBetter\Akeneo\Models\Attribute\Multiselect::class,
            'Text'         => \JustBetter\Akeneo\Models\Attribute\Text::class,
            'Textarea'     => \JustBetter\Akeneo\Models\Attribute\Textarea::class,
            'Boolean'      => \JustBetter\Akeneo\Models\Attribute\Boolean::class,
            'Date'         => \JustBetter\Akeneo\Models\Attribute\Date::class,
        ],
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
