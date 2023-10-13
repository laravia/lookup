<?php

namespace Laravia\Lookup\App\Orchid\Screens;

use Illuminate\Http\Request;
use Laravia\Heart\App\Laravia;
use Laravia\Lookup\App\Models\Lookup as ModelsLookup;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class LookupEditScreen extends Screen
{
    public $lookup;

    public function query(ModelsLookup $lookup): array
    {
        return [
            'lookup' => $lookup
        ];
    }

    public function name(): ?string
    {
        return $this->lookup->exists ? 'Edit lookup' : 'Creating a new lookup';
    }

    public function description(): ?string
    {
        return "Lookups";
    }

    public function commandBar(): array
    {
        return [
            Button::make('Create lookup')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->lookup->exists),

            Button::make('Update')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee($this->lookup->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->lookup->exists),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::columns([
                Layout::rows([
                    Select::make('lookup.filter')
                        ->options(function () {
                            return Laravia::getAllPackageNames();
                        })
                        ->title('filter'),
                    Select::make('lookup.sort')
                        ->options(function () {
                            for ($i = 1; $i <= 200; $i++) {
                                $sort[$i] = $i;
                            }
                            return $sort;
                        })
                        ->title('sort')

                ]),

                Layout::rows([
                    Input::make('lookup.key')
                        ->title('Key')
                        ->placeholder('Key')
                        ->required(),
                    Input::make('lookup.value')
                        ->title('Value')
                        ->placeholder('Value')
                        ->required(),
                ]),

            ]),
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $this->lookup->fill($request->get('lookup'))->save();

        Alert::info('You have successfully created a lookup.');

        return redirect()->route('laravia.lookup');
    }

    public function remove()
    {
        $this->lookup->delete();

        Alert::info('You have successfully deleted the lookup.');

        return redirect()->route('laravia.lookup');
    }
}
