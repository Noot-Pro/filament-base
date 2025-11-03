<?php

namespace NootPro\FilamentBase\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \NootPro\FilamentBase\FilamentBase
 */
class FilamentBase extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \NootPro\FilamentBase\FilamentBase::class;
    }
}
