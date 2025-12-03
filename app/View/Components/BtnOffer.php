<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BtnOffer extends Component
{
   public $offer;
   public $link;
    /**
     * Create a new component instance.
     */
    public function __construct($offer ,$link = null)
    {
          $this->offer =  $offer ;
          $this->link =  $link ;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.btn-offer');
    }
}
