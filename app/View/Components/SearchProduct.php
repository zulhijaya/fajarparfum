<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SearchProduct extends Component
{
    public $subcategories;

    public function __construct($subcategories)
    {
        $this->subcategories = $subcategories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.search-product');
    }
}
