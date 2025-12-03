<?php

namespace App\View\Components\Buttons;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class IndicatorBtn extends Component
{

    public function __construct(
        public readonly ?string $title = null,
        public readonly ?bool $isUpdateAction = true,
        public readonly ?string $type = "primary"
    )
    {
    }

    public function render(): View
    {
        return view('components.buttons.indicator-btn');
    }
}
