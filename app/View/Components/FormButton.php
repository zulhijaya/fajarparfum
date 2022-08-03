<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormButton extends Component
{
    public $route, $parameter, $button;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $parameter = '', $button)
    {
        $this->route = $route;
        $this->parameter = $parameter;
        $this->button = $button;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-button');
    }
}
