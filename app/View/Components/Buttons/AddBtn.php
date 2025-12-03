<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class AddBtn extends Component
{
    public function __construct(public readonly string $title, public readonly string $route)
    {

    }

    public function render()
    {
        return view('components.buttons.add-btn');
    }
}
