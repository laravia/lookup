<?php

namespace Laravia\Lookup\App\Orchid\Screens;

use Laravia\Lookup\App\Models\Lookup as ModelsLookup;
use Laravia\Lookup\App\Orchid\Layouts\LookupListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class Lookup extends Screen
{

    public function query(): iterable
    {
        return [
            'lookups' => ModelsLookup::orderByDesc('id')->paginate(),
        ];
    }

    public function name(): ?string
    {
        return 'Lookup Screen';
    }

    public function description(): ?string
    {
        return 'Lookups of Laravia';
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Create new lookup')
                ->icon('pencil')
                ->route('laravia.lookup.edit')
        ];
    }

    public function layout(): iterable
    {
        return [
            LookupListLayout::class
        ];
    }
}
