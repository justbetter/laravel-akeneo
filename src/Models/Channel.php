<?php

namespace JustBetter\Akeneo\Models;

use JustBetter\Akeneo\Models\Concerns\HasValues;

class Channel extends ApiModel
{
    public string $primaryKey = 'code';
}
