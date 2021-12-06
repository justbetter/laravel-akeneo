<?php

namespace JustBetter\Akeneo;

use ErrorException;
use Illuminate\Support\Str;
use JustBetter\Akeneo\Exceptions\UndefinedAttributeTypeException;
use JustBetter\Akeneo\Models\ApiModel;

class Akeneo
{
    public static function getRequestClass(string $type, ApiModel $model): string
    {
        $modelName = class_basename(
            get_class($model)
        );

        if (in_array($modelName, array_keys(config('akeneo.models.attribute_types')))) {
            $modelName = 'Attribute';
        }

        $class = "JustBetter\\Akeneo\\Requests\\{$modelName}\\{$type}";

        if (! class_exists($class)) {
            throw new ErrorException(
                __('Class ":class" not found', ['class' => $class])
            );
        }

        return $class;
    }

    public static function getAttributeTypeClass(string $type): string
    {
        $attributeType = Str::of($type)->replace('pim_catalog_', '')->studly();

        $model = config('akeneo.models.attribute_types.'.$attributeType);

        if (! $model) {
            throw new UndefinedAttributeTypeException("Model `{$attributeType}` is not defined in the config");
        }

        return $model;
    }
}
