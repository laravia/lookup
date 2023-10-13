<?php

namespace Laravia\Lookup\App\Orchid\Layouts;

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
        ];
    }
}
