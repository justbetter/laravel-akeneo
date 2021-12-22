<?php

namespace JustBetter\Akeneo\Models;

use JustBetter\Akeneo\Models\Concerns\Api\HasAll;
use JustBetter\Akeneo\Models\Concerns\Api\HasFind;
use JustBetter\Akeneo\Models\Concerns\Api\HasLazy;

class ProductModel extends ApiModel
{
    use HasFind;
    use HasLazy;
    use HasAll;

    public string $primaryKey = 'code';
}
