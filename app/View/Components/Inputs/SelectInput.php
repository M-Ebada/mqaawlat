<?php

namespace App\View\Components\Inputs;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class SelectInput extends Component
{
    public function __construct(
        public readonly string     $name,
        public readonly string     $title,
        public readonly Collection $collectionData,
        public readonly Collection $collectionDataSelected,
        public readonly ?Model     $model = null,
        public readonly ?int       $col = 4,
        public readonly ?string    $selectValue = "id",
        public readonly ?string    $selectValueData = "title",
        public readonly ?bool      $required = false,
        public readonly ?bool      $multiple = false,
        public readonly ?bool      $includeKey = false,
        public readonly ?bool      $keyDefault = false,

    )
    {
    }

    public function render(): View
    {
        return view('components.inputs.select-input');
    }
}
