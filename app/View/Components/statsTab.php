<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class statsTab extends Component
{
    /**
     * Create a new component instance.
     */
    public $number;
    public $name;
    public $url;
    public function __construct($number,$name,$url="#")
    {
        $this->number = $number;
        $this->name = $name;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.stats-tab');
    }
}
