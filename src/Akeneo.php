<?php

namespace JustBetter\Akeneo;

use ErrorException;
use JustBetter\Akeneo\Models\ApiModel;

class Akeneo
{
    public static function getRequestClass(string $type, ApiModel $model): string
    {
        $modelName = class_basename(
            get_class($model)
        );

        $class = "JustBetter\\Akeneo\\Requests\\{$modelName}\\{$type}";

        if (! class_exists($class)) {
            throw new ErrorException(
                __('Class ":class" not found', ['class' => $class])
            );
        }

        return $class;
    }
}
