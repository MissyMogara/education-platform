<?php

namespace App\View\Components\buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteButton extends Component
{
    public $label;
    public $route;
    public $id;
    public $message;
    /**
     * Create a new component instance.
     */
    public function __construct($label, $route, $id, $message = "¿Estás seguro de que deseas eliminar este elemento?")
    {
        $this->label = $label;
        $this->route = $route;
        $this->id = $id;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.delete-button');
    }
}
