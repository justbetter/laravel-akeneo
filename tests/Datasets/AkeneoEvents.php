<?php

use JustBetter\Akeneo\Events\ProductCreated;
use JustBetter\Akeneo\Events\ProductModelCreated;
use JustBetter\Akeneo\Events\ProductModelRemoved;
use JustBetter\Akeneo\Events\ProductModelUpdated;
use JustBetter\Akeneo\Events\ProductRemoved;
use JustBetter\Akeneo\Events\ProductUpdated;

dataset('akeneo_events', [
    [ProductCreated::class, [
        "events" => [
            [
                "action"         => "product.created",
                "event_id"       => "c306e088-fb76-479c-bbc0-18fef19da75d",
                "event_datetime" => "2020-10-20T09:13:59+00:00",
                "author"         => "peter",
                "author_type"    => "ui",
                "pim_source"     => "https://demo.akeneo.com",
                "data"           => [
                    "resource" => [
                        "identifier"              => "1111111304",
                        "family"                  => "accessories",
                        "parent"                  => null,
                        "groups"                  => [
                        ],
                        "categories"              => [
                            "master_accessories_sunglasses",
                            "supplier_zaro",
                        ],
                        "enabled"                 => true,
                        "values"                  => [
                            "collection"  => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => [
                                        "winter_2020",
                                    ],
                                ],
                            ],
                            "image"       => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "9/9/c/c/99cc83f105199c667505cfa8ec1458c8be4f0814_sunglasses.jpg",
                                    "_links" => [
                                        "download" => [
                                            "href" => "http://demo.akeneo.com/api/rest/v1/media-files/9/9/c/c/99cc83f105199c667505cfa8ec1458c8be4f0814_sunglasses.jpg/download",
                                        ],
                                    ],
                                ],
                            ],
                            "ean"         => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "1234567890316",
                                ],
                            ],
                            "name"        => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "Sunglasses",
                                ],
                            ],
                            "weight"      => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => [
                                        "amount" => "800.0000",
                                        "unit"   => "GRAM",
                                    ],
                                ],
                            ],
                            "description" => [
                                [
                                    "locale" => "en_US",
                                    "scope"  => "ecommerce",
                                    "data"   => "<p>Brown and gold sunglasses</p>",
                                ],
                            ],
                        ],
                        "created"                 => "2020-10-20T08:30:28+00:00",
                        "updated"                 => "2020-10-20T09:13:59+00:00",
                        "associations"            => [
                            "PACK"         => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "SUBSTITUTION" => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "UPSELL"       => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "X_SELL"       => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                        ],
                        "quantified_associations" => [
                        ],
                        "metadata"                => [
                            "workflow_status" => "working_copy",
                        ],
                    ],
                ],
            ],
        ],
    ]],
    [ProductUpdated::class, [
        "events" => [
            [
                "action"         => "product.updated",
                "event_id"       => "c306e088-fb76-479c-bbc0-18fef19da75d",
                "event_datetime" => "2020-10-20T09:13:59+00:00",
                "author"         => "peter",
                "author_type"    => "ui",
                "pim_source"     => "https://demo.akeneo.com",
                "data"           => [
                    "resource" => [
                        "identifier"              => "1111111304",
                        "family"                  => "accessories",
                        "parent"                  => null,
                        "groups"                  => [
                        ],
                        "categories"              => [
                            "master_accessories_sunglasses",
                            "supplier_zaro",
                        ],
                        "enabled"                 => true,
                        "values"                  => [
                            "collection"  => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => [
                                        "winter_2020",
                                    ],
                                ],
                            ],
                            "image"       => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "9/9/c/c/99cc83f105199c667505cfa8ec1458c8be4f0814_sunglasses.jpg",
                                    "_links" => [
                                        "download" => [
                                            "href" => "http://demo.akeneo.com/api/rest/v1/media-files/9/9/c/c/99cc83f105199c667505cfa8ec1458c8be4f0814_sunglasses.jpg/download",
                                        ],
                                    ],
                                ],
                            ],
                            "ean"         => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "1234567890316",
                                ],
                            ],
                            "name"        => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "Sunglasses",
                                ],
                            ],
                            "weight"      => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => [
                                        "amount" => "800.0000",
                                        "unit"   => "GRAM",
                                    ],
                                ],
                            ],
                            "description" => [
                                [
                                    "locale" => "en_US",
                                    "scope"  => "ecommerce",
                                    "data"   => "<p>Brown and gold sunglasses</p>",
                                ],
                            ],
                        ],
                        "created"                 => "2020-10-20T08:30:28+00:00",
                        "updated"                 => "2020-10-20T09:13:59+00:00",
                        "associations"            => [
                            "PACK"         => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "SUBSTITUTION" => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "UPSELL"       => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "X_SELL"       => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                        ],
                        "quantified_associations" => [
                        ],
                        "metadata"                => [
                            "workflow_status" => "working_copy",
                        ],
                    ],
                ],
            ],
        ],
    ]],
    [ProductRemoved::class, [
        "events" => [
            [
                "action"         => "product.removed",
                "event_id"       => "c306e088-fb76-479c-bbc0-18fef19da75d",
                "event_datetime" => "2020-10-20T09:13:59+00:00",
                "author"         => "peter",
                "author_type"    => "ui",
                "pim_source"     => "https://demo.akeneo.com",
                "data"           => [
                    "resource" => [
                        "identifier"              => "1111111304",
                        "family"                  => "accessories",
                        "parent"                  => null,
                        "groups"                  => [
                        ],
                        "categories"              => [
                            "master_accessories_sunglasses",
                            "supplier_zaro",
                        ],
                        "enabled"                 => true,
                        "values"                  => [
                            "collection"  => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => [
                                        "winter_2020",
                                    ],
                                ],
                            ],
                            "image"       => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "9/9/c/c/99cc83f105199c667505cfa8ec1458c8be4f0814_sunglasses.jpg",
                                    "_links" => [
                                        "download" => [
                                            "href" => "http://demo.akeneo.com/api/rest/v1/media-files/9/9/c/c/99cc83f105199c667505cfa8ec1458c8be4f0814_sunglasses.jpg/download",
                                        ],
                                    ],
                                ],
                            ],
                            "ean"         => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "1234567890316",
                                ],
                            ],
                            "name"        => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "Sunglasses",
                                ],
                            ],
                            "weight"      => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => [
                                        "amount" => "800.0000",
                                        "unit"   => "GRAM",
                                    ],
                                ],
                            ],
                            "description" => [
                                [
                                    "locale" => "en_US",
                                    "scope"  => "ecommerce",
                                    "data"   => "<p>Brown and gold sunglasses</p>",
                                ],
                            ],
                        ],
                        "created"                 => "2020-10-20T08:30:28+00:00",
                        "updated"                 => "2020-10-20T09:13:59+00:00",
                        "associations"            => [
                            "PACK"         => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "SUBSTITUTION" => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "UPSELL"       => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "X_SELL"       => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                        ],
                        "quantified_associations" => [
                        ],
                        "metadata"                => [
                            "workflow_status" => "working_copy",
                        ],
                    ],
                ],
            ],
        ],
    ]],
    [ProductModelCreated::class, [
        "events" => [
            [
                "action"         => "product_model.created",
                "event_id"       => "c306e088-fb76-479c-bbc0-18fef19da75d",
                "event_datetime" => "2020-10-20T09:13:59+00:00",
                "author"         => "peter",
                "author_type"    => "ui",
                "pim_source"     => "https://demo.akeneo.com",
                "data"           => [
                    "resource" => [
                        "identifier"              => "1111111304",
                        "family"                  => "accessories",
                        "parent"                  => null,
                        "groups"                  => [
                        ],
                        "categories"              => [
                            "master_accessories_sunglasses",
                            "supplier_zaro",
                        ],
                        "enabled"                 => true,
                        "values"                  => [
                            "collection"  => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => [
                                        "winter_2020",
                                    ],
                                ],
                            ],
                            "image"       => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "9/9/c/c/99cc83f105199c667505cfa8ec1458c8be4f0814_sunglasses.jpg",
                                    "_links" => [
                                        "download" => [
                                            "href" => "http://demo.akeneo.com/api/rest/v1/media-files/9/9/c/c/99cc83f105199c667505cfa8ec1458c8be4f0814_sunglasses.jpg/download",
                                        ],
                                    ],
                                ],
                            ],
                            "ean"         => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "1234567890316",
                                ],
                            ],
                            "name"        => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "Sunglasses",
                                ],
                            ],
                            "weight"      => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => [
                                        "amount" => "800.0000",
                                        "unit"   => "GRAM",
                                    ],
                                ],
                            ],
                            "description" => [
                                [
                                    "locale" => "en_US",
                                    "scope"  => "ecommerce",
                                    "data"   => "<p>Brown and gold sunglasses</p>",
                                ],
                            ],
                        ],
                        "created"                 => "2020-10-20T08:30:28+00:00",
                        "updated"                 => "2020-10-20T09:13:59+00:00",
                        "associations"            => [
                            "PACK"         => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "SUBSTITUTION" => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "UPSELL"       => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "X_SELL"       => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                        ],
                        "quantified_associations" => [
                        ],
                        "metadata"                => [
                            "workflow_status" => "working_copy",
                        ],
                    ],
                ],
            ],
        ],
    ]],
    [ProductModelUpdated::class, [
        "events" => [
            [
                "action"         => "product_model.updated",
                "event_id"       => "c306e088-fb76-479c-bbc0-18fef19da75d",
                "event_datetime" => "2020-10-20T09:13:59+00:00",
                "author"         => "peter",
                "author_type"    => "ui",
                "pim_source"     => "https://demo.akeneo.com",
                "data"           => [
                    "resource" => [
                        "identifier"              => "1111111304",
                        "family"                  => "accessories",
                        "parent"                  => null,
                        "groups"                  => [
                        ],
                        "categories"              => [
                            "master_accessories_sunglasses",
                            "supplier_zaro",
                        ],
                        "enabled"                 => true,
                        "values"                  => [
                            "collection"  => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => [
                                        "winter_2020",
                                    ],
                                ],
                            ],
                            "image"       => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "9/9/c/c/99cc83f105199c667505cfa8ec1458c8be4f0814_sunglasses.jpg",
                                    "_links" => [
                                        "download" => [
                                            "href" => "http://demo.akeneo.com/api/rest/v1/media-files/9/9/c/c/99cc83f105199c667505cfa8ec1458c8be4f0814_sunglasses.jpg/download",
                                        ],
                                    ],
                                ],
                            ],
                            "ean"         => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "1234567890316",
                                ],
                            ],
                            "name"        => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "Sunglasses",
                                ],
                            ],
                            "weight"      => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => [
                                        "amount" => "800.0000",
                                        "unit"   => "GRAM",
                                    ],
                                ],
                            ],
                            "description" => [
                                [
                                    "locale" => "en_US",
                                    "scope"  => "ecommerce",
                                    "data"   => "<p>Brown and gold sunglasses</p>",
                                ],
                            ],
                        ],
                        "created"                 => "2020-10-20T08:30:28+00:00",
                        "updated"                 => "2020-10-20T09:13:59+00:00",
                        "associations"            => [
                            "PACK"         => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "SUBSTITUTION" => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "UPSELL"       => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "X_SELL"       => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                        ],
                        "quantified_associations" => [
                        ],
                        "metadata"                => [
                            "workflow_status" => "working_copy",
                        ],
                    ],
                ],
            ],
        ],
    ]],
    [ProductModelRemoved::class, [
        "events" => [
            [
                "action"         => "product_model.removed",
                "event_id"       => "c306e088-fb76-479c-bbc0-18fef19da75d",
                "event_datetime" => "2020-10-20T09:13:59+00:00",
                "author"         => "peter",
                "author_type"    => "ui",
                "pim_source"     => "https://demo.akeneo.com",
                "data"           => [
                    "resource" => [
                        "identifier"              => "1111111304",
                        "family"                  => "accessories",
                        "parent"                  => null,
                        "groups"                  => [
                        ],
                        "categories"              => [
                            "master_accessories_sunglasses",
                            "supplier_zaro",
                        ],
                        "enabled"                 => true,
                        "values"                  => [
                            "collection"  => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => [
                                        "winter_2020",
                                    ],
                                ],
                            ],
                            "image"       => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "9/9/c/c/99cc83f105199c667505cfa8ec1458c8be4f0814_sunglasses.jpg",
                                    "_links" => [
                                        "download" => [
                                            "href" => "http://demo.akeneo.com/api/rest/v1/media-files/9/9/c/c/99cc83f105199c667505cfa8ec1458c8be4f0814_sunglasses.jpg/download",
                                        ],
                                    ],
                                ],
                            ],
                            "ean"         => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "1234567890316",
                                ],
                            ],
                            "name"        => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => "Sunglasses",
                                ],
                            ],
                            "weight"      => [
                                [
                                    "locale" => null,
                                    "scope"  => null,
                                    "data"   => [
                                        "amount" => "800.0000",
                                        "unit"   => "GRAM",
                                    ],
                                ],
                            ],
                            "description" => [
                                [
                                    "locale" => "en_US",
                                    "scope"  => "ecommerce",
                                    "data"   => "<p>Brown and gold sunglasses</p>",
                                ],
                            ],
                        ],
                        "created"                 => "2020-10-20T08:30:28+00:00",
                        "updated"                 => "2020-10-20T09:13:59+00:00",
                        "associations"            => [
                            "PACK"         => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "SUBSTITUTION" => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "UPSELL"       => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                            "X_SELL"       => [
                                "groups"         => [
                                ],
                                "products"       => [
                                ],
                                "product_models" => [
                                ],
                            ],
                        ],
                        "quantified_associations" => [
                        ],
                        "metadata"                => [
                            "workflow_status" => "working_copy",
                        ],
                    ],
                ],
            ],
        ],
    ]],
]);
