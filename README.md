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
php artisan vendor:publish --provider="JustBetter\Akeneo\AkeneoServiceProvider" --tag="laravel-akeneo-config"
```

This is the contents of the published config file:

```php
return [
    'connections' => [
        'default' => [
            'url' => env('AKENEO_URL'),
            'client_id' => env('AKENEO_CLIENT_ID'),
            'secret' => env('AKENEO_SECRET'),
            'username' => env('AKENEO_USERNAME'),
            'password' => env('AKENEO_PASSWORD'),
        ],
    ],
];
```

## Usage

supported features:
* Product Models
  * Get all
  * Find by code
  * Save
* Products
  * Get all
  * Find by code
  * Save
* Multiple Akeneo connections (WIP)

### How to use

#### All
Getting all of the resources from Akeneo returns a `LazyCollection`
```php
$models = ProductModel::all();
```
To get all resources in a collection
```php
$collection = ProductModel::all()->collect();
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
