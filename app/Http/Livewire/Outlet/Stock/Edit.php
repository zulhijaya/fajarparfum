<?php

namespace App\Http\Livewire\Outlet\Stock;

use App\Models\Outlet;
use App\Models\Product;
use Livewire\Component;

class Edit extends Component
{
    public Outlet $outlet;
    public Product $product;
    public $stock;

    public $rules = [
        'stock' => 'required'
    ];

    public function messages()
    {
        return [
            'stock.required' => 'Stok tidak boleh kosong'
        ];
    }

    public function mount()
    {
        $this->current_stock = $this->outlet->products()->find($this->product->id)->pivot->stock;
    }
    
    public function render()
    {
        return view('livewire.outlet.stock.edit')->layoutData([
            'titles' => [
                [
                    'name' => 'Toko',
                    'route' => 'outlet.index'
                ],
                [
                    'name' => $this->outlet->name,
                    'route' => 'outlet.index'
                ],
                [
                    'name' => $this->product->name,
                    'route' => 'outlet.index'
                ],
                [
                    'name' => 'Edit Stok'
                ]
            ],
            'create' => [
                'route' => ''
            ]
        ]);
    }

    public function update()
    {
        $this->validate();

        $this->outlet->products()->updateExistingPivot($this->product->id, ['stock' => $this->stock]);
        
        session()->flash('message', ['Stok ' . $this->product->name, 'diupdate']);
    
        return redirect()->route('outlet.stock.index', $this->outlet);
    }
}
