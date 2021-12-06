<?php

use JustBetter\Akeneo\DataObjects\Option;
use JustBetter\Akeneo\Exceptions\UndefinedAttributeTypeException;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\Attribute;
use JustBetter\Akeneo\Models\Product;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeAttributeApi;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeProductApi;
use JustBetter\Akeneo\Tests\Fakes\Models\FakeModel;

it('can construct a model', function () {
    $model = new FakeModel(['id' => 5]);

    expect($model)
        ->id->toBe(5);
});

it('throws exception when the request classes cannot be found', function () {
    FakeModel::lazy();
})->expectException(ErrorException::class);

it('can be accessed like an array', function () {
    $model = new FakeModel(['id' => 5, 'name' => 'test']);

    expect($model)
        ->id->toBe(5)
        ->name->toBe('test');

    expect($model['id'])->toBe(5);
    expect($model['name'])->toBe('test');

    $model['id'] = 1;

    expect($model['id'])->toBe(1);

    expect(isset($model['id']))->toBeTrue();

    unset($model['id']);

    expect($model['id'])->toBeNull();
});

it('can be transformed into an array', function () {
    $model = new FakeModel(['id' => 5, 'name' => 'test']);

    expect((array) $model)->toBeArray();
    expect($model->toArray())->toBeArray();
});

it('can filter models', function () {
    Akeneo::fake();

    Product::query()
        ->where('code', 'test')
        ->get();

    expect(FakeProductApi::$all)
        ->query->toBeArray()
        ->query->search->toMatchArray([
            'code' => [
                [
                    'operator' => '=',
                    'value'    => 'test',
                ],
            ],
        ]);
});

it('has a fallback to the query builder', function () {
    Akeneo::fake();

    Product::where('code', 'test')
        ->get();

    expect(FakeProductApi::$all)
        ->query->toBeArray()
        ->query->search->toMatchArray([
            'code' => [
                [
                    'operator' => '=',
                    'value'    => 'test',
                ],
            ],
        ]);
});

it('Throws exception if method does not exist on querybuilder', function () {
    Product::fakeMethod('code', 'test')
        ->get();
})->expectException(BadMethodCallException::class);

it('has a copy of the original attributes', function () {
    Akeneo::fake();

    $product = Product::all()->first();

    expect($product)
        ->identifier->toBe('::test::');

    $product->identifier = 'test';

    expect($product)
        ->identifier->not->toBe('::test::');

    expect($product->getOriginal('identifier'))
        ->toBe('::test::');
});

it('can access attributes', function () {
    Akeneo::fake();

    $product = Product::all()->first();

    expect($product)
        ->product_name->toBeInstanceOf(Attribute::class);
});

it('returns null when a attribute doesn\'t exist', function () {
    Akeneo::fake();

    $product = Product::all()->first();

    expect($product)
        ->non_existing->toBeNull();
});

it('throws exception when an attribute type is isn\'t defined in config', function () {
    Akeneo::fake();

    FakeAttributeApi::$attributeType = 'pim_catalog_test';

    $product = Product::find('test')->product_name;
})->throws(UndefinedAttributeTypeException::class);

it('can handle simpleselect', function () {
    Akeneo::fake();

    FakeAttributeApi::$attributeType = 'pim_catalog_simpleselect';

    $product = Product::find('test');

    expect($product->product_name)
        ->toBeInstanceOf(Attribute\Simpleselect::class);

    expect($product->product_name->getSelected())
        ->toMatchArray([
            Option::make('testing product'),
        ]);

    $product->product_name->addOption(
        Option::make('testing product 2')
    );

    expect($product->product_name->getSelected())
        ->toMatchArray([
            Option::make('testing product 2'),
        ]);
});

it('can handle multiselects', function () {
    Akeneo::fake();

    FakeAttributeApi::$attributeType = 'pim_catalog_multiselect';

    $product = Product::find('test');

    expect($product->product_name)
        ->toBeInstanceOf(Attribute\Multiselect::class);

    expect($product->product_name->getSelected())
        ->toMatchArray([
            Option::make('testing product'),
        ]);

    $product->product_name->addOption(
        Option::make('testing product 2')
    );

    expect($product->product_name->getSelected())
        ->toMatchArray([
            Option::make('testing product'),
            Option::make('testing product 2'),
        ]);

    $product->product_name->removeOption(
        Option::make('testing product')
    );

    expect($product->product_name->getSelected())
        ->toMatchArray([
            1 => Option::make('testing product 2'),
        ]);

    $product->product_name->syncOptions([
        Option::make('testing product 4'),
    ]);

    expect($product->product_name->getSelected())
        ->toMatchArray([
            Option::make('testing product 4'),
        ]);
});
