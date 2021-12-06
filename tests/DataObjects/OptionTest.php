<?php

use JustBetter\Akeneo\DataObjects\Option;

it('can be converted to an array', function () {
    expect(Option::make('test option 1')->toArray())
        ->toMatchArray([
            'data'   => 'test option 1',
            'locale' => null,
            'scope'  => null,
        ]);
});
