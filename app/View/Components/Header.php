<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    public $titles, $create;
    
    public function __construct($titles = [], $create)
    {
        $this->titles = $titles;
        $this->create = $create;
    }

    public function render()
    {
        // $users = User::where('approved_at', NULL)->latest()->get();
        return view('components.header', [
            // 'users' => $users
        ]);
    }
}
