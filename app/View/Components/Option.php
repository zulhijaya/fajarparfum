<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Option extends Component
{
    public $first, $delete, $parameter;

    public function __construct($first, $delete = true, $parameter = '')
    {
        $this->first = $first;
        $this->delete = $delete;
        $this->parameter = $parameter;
    }

    public function render()
    {
        return view('components.option');
    }
}
