<?php

namespace App\Http\Livewire\Merk;

use App\Models\Merk;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $merks = Merk::withCount('wholesale_prices')->get();

        return view('livewire.merk.index', [
            'merks' => $merks
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Merek'
                ]
            ],
            'create' => [
                'route' => 'merk.create', 
                'parameter' => ''
            ]
        ]);
    }

    public function delete(Merk $merk)
    {
        $name = $merk->name;
        $merk->delete();
        
        session()->flash('message', [$name, 'dihapus']);
    
        return redirect()->route('merk.index');
    }
}
