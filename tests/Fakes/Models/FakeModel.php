<?php

namespace JustBetter\Akeneo\Tests\Fakes\Models;

use JustBetter\Akeneo\Models\ApiModel;
use JustBetter\Akeneo\Models\Concerns\Api\HasAll;
use JustBetter\Akeneo\Models\Concerns\Api\HasFind;
use JustBetter\Akeneo\Models\Concerns\Api\HasLazy;

class FakeModel extends ApiModel
{
    use HasFind;
    use HasLazy;
    use HasAll;
}
