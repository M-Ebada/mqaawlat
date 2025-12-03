<?php

namespace App\View\Components;

use App\Services\Spcialcategory\SpcialcategoryServices;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Spcialcategory extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(private readonly SpcialcategoryServices $spcialcategoryServices)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $spcialcategories = $this->spcialcategoryServices->index(true);
        return view('components.spcialcategory',compact('spcialcategories'));
    }
}
