<?php

namespace Laravia\Lookup\App\Orchid\Screens;

use Illuminate\Http\Request;
use Laravia\Lookup\App\Models\Lookup as ModelsLookup;
use Laravia\Lookup\App\Orchid\Layouts\LookupListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class LookupScreen extends Screen
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

    public function remove(Request $request): void
    {
        ModelsLookup::findOrFail($request->get('id'))->delete();

        Alert::info('You have successfully deleted the lookup.');
    }
}
