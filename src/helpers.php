<?php

use JustBetter\Akeneo\Integrations\Akeneo;

if (! function_exists('akeneo')) {
    function akeneo(): Akeneo
    {
        return app('akeneo');
    }
}
