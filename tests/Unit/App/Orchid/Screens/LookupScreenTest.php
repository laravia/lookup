<?php

namespace Laravia\Lookup\Tests\Unit\App\Orchid\Screens;

use Laravia\Heart\App\Classes\TestCase;
use Laravia\Heart\App\Classes\TestScreenCaseTrait;
use Laravia\Lookup\App\Orchid\Screens\LookupScreen;

class LookupScreenTest extends TestCase
{

    use TestScreenCaseTrait;
    public function getScreenTestClass()
    {
        return new LookupScreen();
    }

}
