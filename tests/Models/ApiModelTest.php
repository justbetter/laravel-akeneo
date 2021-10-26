<?php

use JustBetter\Akeneo\Tests\Fakes\Models\FakeModel;

it('can construct a model', function () {
    $model = new FakeModel(['id' => 5]);

    expect($model)
        ->id->toBe(5);
});

it('throws exception when the request classes cannot be found', function () {
    FakeModel::all();
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
