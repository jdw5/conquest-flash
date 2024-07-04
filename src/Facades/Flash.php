<?php

namespace Conquest\Flash\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Conquest\Flash\Flash
 */
class Flash extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Conquest\Flash\Flash::class;
    }
}
