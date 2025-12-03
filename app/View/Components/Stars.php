<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Stars extends Component
{
    public $count;
    public $rate;
    public $type;
    public $detail;

    /**
     * Create a new component instance.
     */
    public function __construct($count =0 ,$rate  =0 ,$type  =null ,$detail=true)
    {
        $this->count=$count;
        $this->rate=$rate;
        $this->type=$type;
        $this->detail=$detail;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.stars');
    }
}
