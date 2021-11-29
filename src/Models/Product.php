<?php

namespace JustBetter\Akeneo\Models;

use JustBetter\Akeneo\Models\Concerns\HasValues;

class Product extends ApiModel
{
    public string $primaryKey = 'identifier';
}
