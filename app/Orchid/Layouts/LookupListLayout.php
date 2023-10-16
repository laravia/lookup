<?php

namespace Laravia\Lookup\App\Orchid\Layouts;

use Laravia\Lookup\App\Models\Lookup;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;

class LookupListLayout extends Table
{
    public $target = 'lookups';

    public function columns(): array
    {
        return [

            TD::make('filter', 'Filter')
                ->sort()
                ->render(function ($lookup) {
                    return $lookup->filter;
                }),

            TD::make('key', 'Key')->sort(),

            TD::make('value', 'Value')
                ->sort()
                ->render(function ($lookup) {
                    return $lookup->value;
                }),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Lookup $lookup) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('laravia.lookup.edit', $lookup->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Once the lookup entry is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $lookup->id,
                            ]),
                    ]))
        ];
    }
}
