<?php

namespace Laravia\Lookup\Tests\Feature\App\Orchid\Screens;

use Laravia\Heart\App\Classes\TestCase;

class LookupScreenFeatureTest extends TestCase
{

    public function test_lookup_screen_can_be_rendered()
    {
        $this->actAsAdmin();
        $response = $this->get(route('laravia.lookup.list'));
        $response->assertOk();
    }

}
