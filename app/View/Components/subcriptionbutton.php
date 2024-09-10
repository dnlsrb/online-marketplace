<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class subcriptionbutton extends Component
{
    /**
     * Create a new component instance.
     */

 
     public $routeTo;
    public function __construct($routeTo)
    {
  
        $this->routeTo = $routeTo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shared.subcription-button');
    }
}
