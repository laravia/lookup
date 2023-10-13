<?php

namespace Laravia\Lookup\App\Models;

use Laravia\Heart\App\Models\Model;
use Orchid\Screen\AsSource;

class Lookup extends Model
{
    use AsSource;
    protected $fillable = [
        'filter',
        'key',
        'value',
        'sort'
    ];

}
