<?php

return [
    'connections' => [
        'default' => [
            'url' => env('AKENEO_URL'),
            'client_id' => env('AKENEO_CLIENT_ID'),
            'secret' => env('AKENEO_SECRET'),
            'username' => env('AKENEO_USERNAME'),
            'password' => env('AKENEO_PASSWORD'),
        ]
    ]
];
