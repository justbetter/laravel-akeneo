<?php

namespace JustBetter\Akeneo\Models;

use JustBetter\Akeneo\Models\Concerns\HasValues;

class ProductModel extends ApiModel
{
    use HasValues;

    public string $primaryKey = 'code';
}
