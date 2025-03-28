<?php

namespace App\View\Components\buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ViewButton extends Component
{
    public $label;
    public $route;
    public $id;
    /**
     * Create a new component instance.
     */
    public function __construct($label, $route, $id)
    {
        $this->label = $label;
        $this->route = $route;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.view-button');
    }
}
