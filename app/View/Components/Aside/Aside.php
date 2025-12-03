<?php

namespace App\View\Components\Aside;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Aside extends Component
{

    public function __construct(
        public readonly array $links,
        public readonly string $logoutLink,
        public readonly string $loginLink,
        public readonly string $logo,
    )
    {

    }

    public function render(): View
    {
        return view('components.aside.aside');
    }
}
