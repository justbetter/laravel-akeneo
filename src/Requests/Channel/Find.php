<?php

namespace JustBetter\Akeneo\Requests\Channel;

use Akeneo\Pim\ApiClient\Exception\NotFoundHttpException;
use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Models\Channel;
use JustBetter\Akeneo\Requests\FindRequest;

class Find extends FindRequest
{
    public function send(): ?Channel
    {
        try {
            $channel = Akeneo::getChannelApi()->get($this->code);
        } catch (NotFoundHttpException $e) {
            return null;
        }

        $model = config('akeneo.models.channel');

        return new $model($channel);
    }
}
