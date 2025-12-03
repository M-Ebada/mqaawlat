<?php

namespace App\View\Components\Card;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public function __construct(
        public readonly string $title,
        public readonly ?string $backBtnRoute = null
    )
    {
    }

    public function render(): View
    {
        return view('components.card.header');
    }
}
