<?php

namespace JustBetter\Akeneo\Requests\Channel;

use JustBetter\Akeneo\Facades\Akeneo;
use JustBetter\Akeneo\Requests\UpsertRequest;

class Create extends UpsertRequest
{
    public function send(array $data): bool
    {
        Akeneo::getChannelApi()->create($this->code, $data);

        return true;
    }
}
