<?php

use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\Product;
use JustBetter\Akeneo\Tests\Fakes\Api\FakeProductApi;

it('can get the first item', function () {
    Akeneo::spy()
        ->expects('getProductApi')
        ->andReturn($fakeProductApi = new FakeProductApi());

    $product = Product::where('code', 'test')
        ->first();

    expect($product)->toBeInstanceOf(Product::class);
});
