<?php

namespace App\View\Components\buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AproveRejectButton extends Component
{
    public $route;
    public $id;
    public $message;
    public $label;
    /**
     * Create a new component instance.
     */
    public function __construct($route, $id, $message, $label)
    {
        $this->route = $route;
        $this->id = $id;
        $this->message = $message;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.aprove-reject-button');
    }
}
