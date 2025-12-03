<?php

namespace App\View\Components\Datatable;

use Illuminate\View\Component;

class Script extends Component
{
    public function __construct(
        public readonly string $route,
        public readonly array  $columns,
    )
    {
    }

    public function render()
    {
        return view('components.datatable.script');
    }
}
