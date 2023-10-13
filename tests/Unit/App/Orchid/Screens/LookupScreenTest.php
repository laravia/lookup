<?php

namespace Laravia\Lookup\Tests\Unit\App\Orchid\Screens;

use Laravia\Lookup\App\Orchid\Screens\Lookup;
use Laravia\Heart\App\Classes\TestCase;
use Laravia\Heart\App\Classes\TestScreenCaseTrait;

class LookupScreenTest extends TestCase
{

    use TestScreenCaseTrait;
    public function getScreenTestClass()
    {
        return new Lookup();
    }

}
