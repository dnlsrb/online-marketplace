<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class subcriptioncard extends Component
{
    public $price;
    public $title;
    public $date;
    public $description;
    public $popular;

    public function __construct($price, $title, $date, $description, $popular = false)
    {
        $this->price = $price;
        $this->title = $title;
        $this->date = $date;
        $this->description = $description;
        $this->popular = $popular;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shared.subcription-card');
    }
}
