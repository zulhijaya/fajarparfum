<?php

namespace App\Http\Livewire\Outlet;

use App\Models\Outlet;
use Livewire\Component;

class Show extends Component
{
    public Outlet $outlet;
    
    public function render()
    {
        return view('livewire.outlet.show')->layoutData([
            'titles' => [
                [
                    'name' => 'Toko',
                    'route' => 'outlet.index'
                ],
                [
                    'name' => $this->outlet->name
                ]
            ],
            'create' => [
                'route' => ''
            ]
        ]);
    }
}
