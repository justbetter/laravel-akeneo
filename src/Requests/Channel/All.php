<?php

namespace JustBetter\Akeneo\Requests\Channel;

use Illuminate\Support\Collection;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\AllRequest;

class All extends AllRequest
{
    public function send(): Collection
    {
        return cache()->remember(
            'akeneo_channel_all_'.json_encode($this->filters),
            config('akeneo.cache_ttl', 0),
            function () {
                $models = [];

                $channels = Akeneo::getChannelApi()->all(50, ['search' => $this->filters]);

                $model = config('akeneo.models.channel');

                foreach ($channels as $channel) {
                    $models[] = new $model($channel);
                }

                return $model::newCollection($models);
            });
    }
}
