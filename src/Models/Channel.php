<?php

namespace JustBetter\Akeneo\Models;

use JustBetter\Akeneo\Models\Concerns\HasValues;

class Channel extends ApiModel
{
    use HasValues;

    public string $primaryKey = 'code';
}
