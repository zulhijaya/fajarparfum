<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OptionLink extends Component
{
    public $route, $routedata, $text;

    public function __construct($route, $routedata, $text)
    {
        $this->route = $route;
        $this->routedata = $routedata;
        $this->text = $text;
    }

    public function render()
    {
        return view('components.option-link');
    }
}
