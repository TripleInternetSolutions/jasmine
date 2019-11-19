<?php

namespace TIS\Jasmine\Facades;

use Illuminate\Support\Facades\Facade;

class Jasmine extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'jasmine';
    }

}