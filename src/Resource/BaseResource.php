<?php

namespace NootPro\FilamentBase\Resource;

use Filament\Resources\Resource;

class BaseResource extends Resource
{
    public static function langFile(): string
    {
        return str(parent::getSlug())->explode('/')->last();
    }

    public static function getModelLabel(): string
    {
        return __(static::langFile() . '.titleSingle');
    }

    public static function getPluralModelLabel(): string
    {
        return __(static::langFile() . '.title');
    }
}
