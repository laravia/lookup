<?php

use Illuminate\Support\Facades\Route;
use Laravia\Lookup\App\Orchid\Screens\LookupEditScreen;
use Laravia\Lookup\App\Orchid\Screens\LookupScreen;
use Tabuna\Breadcrumbs\Trail;

$prefix = config('platform.prefix');

Route::middleware(['web', 'auth', 'platform'])->group(function () use ($prefix) {

    Route::screen($prefix . '/lookups', LookupScreen::class)
        ->name('laravia.lookup')
        ->breadcrumbs(function (Trail $trail) {
            return $trail
                ->parent('platform.index')
                ->push('Lookup');
        });

    Route::screen($prefix . '/lookup/{lookup?}', LookupEditScreen::class)
        ->name('laravia.lookup.edit')->breadcrumbs(function (Trail $trail) {
            return $trail
                ->parent('laravia.lookup')
                ->push('Lookup');
        });

});
