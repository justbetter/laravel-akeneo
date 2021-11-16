# Akeneo wrapper for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/justbetter/laravel-akeneo.svg?style=flat-square)](https://packagist.org/packages/justbetter/laravel-akeneo)
[![GitHub Code Quality Action Status](https://img.shields.io/github/workflow/status/justbetter/laravel-akeneo/code-quality?label=tests+%26+static+analysis)](https://github.com/justbetter/laravel-akeneo/actions/workflows/code-quality.yml?query=workflow%3Acode-quality++branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/justbetter/laravel-akeneo/Check%20&%20fix%20styling?label=code%20style)](https://github.com/justbetter/laravel-akeneo/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/justbetter/laravel-akeneo.svg?style=flat-square)](https://packagist.org/packages/justbetter/laravel-akeneo)

This package allows you to work with Akeneo in a more Laravel like way.

## Requirements

* PHP 8 or above
* Akeneo installation

## Installation

You can install the package via composer:

```bash
composer require justbetter/laravel-akeneo
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="JustBetter\Akeneo\AkeneoServiceProvider" --tag="akeneo-config"
```

This is the contents of the published config file:

```php
return [
    'models' => [
        'product_model' => \JustBetter\Akeneo\Models\ProductModel::class,
        'product' => \JustBetter\Akeneo\Models\Product::class,
        'attribute' => \JustBetter\Akeneo\Models\Attribute::class,
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
    
    'cache_ttl' => 30,
];
```

## Usage

supported features:
* Multiple Akeneo connections (WIP)
* Custom model classes
* Product Models
  * Get all
  * Get all lazily
  * Find by code
  * Save
* Products
  * Get all
  * Get all lazily
  * Find by code
  * Save

### How to use

#### All
Get all of the resources from Akeneo
```php
$models = ProductModel::all();
```

This will return a `Collection` by default but can be modified
by overwriting the `newCollection` method on your custom model.

The `all()` method can also be cached by setting the TTL in the config

#### Lazy
Getting all of the resources lazily from Akeneo returns a `LazyCollection`
```php
$models = ProductModel::lazy();
```
See the laravel docs on [lazy collections](https://laravel.com/docs/8.x/collections#lazy-collections) for a full list of methods


#### Find
Find a resource by its code
```php
$product = Product::find('code-123');
```

#### Find
Save an altered model and persist it to akeneo

There is also a method `setValue()` to change attributes. 
`NOTE: It's subject to change and in the near future each value 
(attribute) will become it's own class by the attributes type`
```php
$product = Product::find('code-123');

$product->setValue('product_name', 'test product 3');

$product->save();
```

## Testing

The workflow requires `99%` of the package to be tested.

```bash
make test
# -- OR --
make coverage
```

Make sure to also run static analysis checks
```bash
make analysis
```

Or combine the 2 requirements
```bash
make all
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Quinten Buis](https://github.com/quintenbuis)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
