<?php

namespace App\View\Components\buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ToEnrollButton extends Component
{
    public $label;
    public $route;
    public $student;
    public $course;

    /**
     * Create a new component instance.
     */
    public function __construct($label, $route, $student, $course)
    {
        $this->label = $label;
        $this->route = $route;
        $this->student = $student;
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.to-enroll-button');
    }
}
