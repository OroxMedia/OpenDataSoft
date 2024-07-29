<?php

namespace OroxMedia\OpenDataSoft\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \OroxMedia\OpenDataSoft\OpenDataSoft
 */
class OpenDataSoft extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \OroxMedia\OpenDataSoft\OpenDataSoft::class;
    }
}
