<?php

namespace App\View\Components\Images;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Avatar extends Component
{

    public function __construct(
        public readonly ?string $image = null,
        public readonly string $name = "image"
    )
    {
    }

    public function render(): View
    {
        return view('components.images.avatar');
    }
}
