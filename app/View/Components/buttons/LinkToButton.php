<?php

namespace App\View\Components\buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LinkToButton extends Component
{
    public $route;
    public $label;
    /**
     * Create a new component instance.
     */
    public function __construct($route, $label)
    {
        $this->route = $route;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.link-to-button');
    }
}
