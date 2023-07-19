<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class notification extends Component
{
    /**
     * Create a new component instance.
     */
    public $class;
    public $text;
    public $delay;
    public function __construct($class,$text,$delay)
    {
        $this->class = $class;
        $this->text = $text;
        $this->delay = $delay;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notification',["class"=>$this->class, "text"=>$this->text,"delay"=>$this->delay]);
    }
}
