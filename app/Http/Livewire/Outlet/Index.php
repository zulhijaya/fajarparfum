<?php

namespace App\Http\Livewire\Outlet;

use App\Models\Outlet;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $outlets = auth()->user()->outlets()->withCount('users as employees_count', 'products as stocks_count')->get();

        return view('livewire.outlet.index', [
            'outlets' => $outlets
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Toko',
                    'route' => 'outlet.index'
                ]
            ],
            'create' => [
                'route' => 'outlet.create',
                'parameter' => ''
            ]
        ]);
    }

    public function delete(Outlet $outlet)
    {
        $name = $outlet->name;
        $outlet->delete();
        
        session()->flash('message', [$name, 'dihapus']);
    
        return redirect()->route('outlet.index');
    }
}
