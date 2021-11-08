<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use function Pest\Laravel\postJson;

it('can fire events', function ($expectedEvent, $payload) {
    Event::fake();

    postJson(route('akeneo-webhook'), $payload);

    Event::assertDispatched($expectedEvent);
})
    ->with('akeneo_events');

it('handles no events being send', function () {
    $response = postJson(route('akeneo-webhook'), []);

    expect($response->status())->toBe(Response::HTTP_NO_CONTENT);
});

it('gives a notice when a event is not implemented', function () {
    $response = postJson(route('akeneo-webhook'), [
        'events' => [
            [
                "action" => "product.unsupported",
            ],
        ],
    ]);

    expect($response->status())->toBe(Response::HTTP_NOT_IMPLEMENTED);
});
