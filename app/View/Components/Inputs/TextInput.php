<?php

namespace App\View\Components\Inputs;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

 class TextInput extends Component
{

    public function __construct(
        public readonly string  $name,
        public readonly string  $title,
        public readonly ?string $placeholder = null,
        public readonly ?string $type = "text",
        public readonly ?int    $col = 4,
        public readonly ?bool   $required = false,
        public readonly ?Model  $model = null,
        public readonly ?bool   $isTranslatableInput = false,
    )
    {
    }

    public function render(): View
    {
        return view('components.inputs.text-input');
    }
}
