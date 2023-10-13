<?php

namespace Laravia\Lookup\App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravia\Lookup\App\Lookup;
use Laravia\Heart\App\Laravia;
use Laravia\Heart\App\Traits\ServiceProviderTrait;

class LookupServiceProvider extends ServiceProvider
{
    use ServiceProviderTrait;

    protected $name = "lookup";

    public function boot(): void
    {
        $this->defaultBootMethod();
    }
}
