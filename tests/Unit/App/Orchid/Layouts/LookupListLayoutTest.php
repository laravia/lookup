<?php

namespace Laravia\Lookup\Tests\Unit\App\Orchid\Layouts;

use Laravia\Lookup\App\Orchid\Layouts\LookupListLayout;
use Laravia\Heart\App\Classes\TestCase;

class LookupListLayoutTest extends TestCase
{

    public $class = 'Laravia\Lookup\App\Orchid\Layouts\LookupListLayout';

    public function testInitClass()
    {
        $this->assertClassExist($this->class);
    }

    public function testColumnsExist()
    {
        $this->assertMethodInClassExists('columns', LookupListLayout::class);
    }
    public function testColumns()
    {
        $this->assertIsArray((new LookupListLayout)->columns());
    }
}
