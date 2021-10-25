<?php

use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Tests\Fakes\Models\FakeModel;

it('can construct a model', function () {
    $model = new FakeModel(['id' => 5]);

    expect($model)
        ->id->toBe(5);
});

it('throws exception when the request classes cannot be found', function () {
    FakeModel::all();
})->expectException(ErrorException::class);
