<?php

namespace App\View\Components\Card;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Body extends Component
{
    public function render(): View
    {
        return view('components.card.body');
    }
}
