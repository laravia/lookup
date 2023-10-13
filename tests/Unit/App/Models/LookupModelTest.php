<?php

namespace Laravia\Lookup\Tests\Unit\App;

use Laravia\Lookup\App\Models\Lookup;
use Laravia\Heart\App\Classes\TestCase;

class LookupModelTest extends TestCase
{
    public function testInitClass()
    {
        $this->assertClassExist(Lookup::class);
    }

    public function testCreateLookup()
    {
        $filter = $this->faker->word;
        $key = $this->faker->word;
        $value = $this->faker->word;
        $sort = $this->faker->numberBetween(1, 100);

        Lookup::create([
            'filter' => $filter,
            'key' => $key,
            'value' => $value,
            'sort' => $sort
        ]);

        $this->assertDatabaseHas('lookups', [
            'filter' => $filter,
            'key' => $key,
            'value' => $value,
            'sort' => $sort
        ]);
    }
}
