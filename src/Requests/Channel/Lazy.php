<?php

namespace JustBetter\Akeneo\Requests\Channel;

use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\LazyRequest;

class Lazy extends LazyRequest
{
    public function send(): LazyCollection
    {
        $model = config('akeneo.models.channel');

        return LazyCollection::make(function () use ($model) {
            $channels = Akeneo::getChannelApi()->all(50);

            foreach ($channels as $channel) {
                yield new $model($channel);
            }
        });
    }
}
