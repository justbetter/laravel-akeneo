<?php

namespace JustBetter\Akeneo\Models;

use JustBetter\Akeneo\Models\Concerns\HasValues;

class ProductModel extends ApiModel
{
    public string $primaryKey = 'code';
}
