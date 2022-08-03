<?php

namespace App\Http\Livewire\Outlet\Stock;

use App\Models\Outlet;
use App\Models\Product;
use Livewire\Component;

class Add extends Component
{
    public Outlet $outlet;
    public Product $product;
    public $current_stock, $stock;

    public $rules = [
        'stock' => 'required'
    ];

    public function mount()
    {
        $this->current_stock = $this->outlet->products()->find($this->product->id)->pivot->stock;
    }

    public function messages() 
    {
        return [
            'stock.required' => 'Stok tambahan tidak boleh kosong'
        ];
    }
    
    public function render()
    {
        return view('livewire.outlet.stock.add')->layoutData([
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
                    'name' => 'Tambah Stok'
                ]
            ],
            'create' => [
                'route' => ''
            ]
        ]);
    }

    public function add()
    {
        $this->validate();

        $this->outlet->products()->updateExistingPivot($this->product->id, ['stock' => $this->current_stock + $this->stock]);
        
        session()->flash('message', ['Stok ' . $this->product->name, 'ditambahkan']);
    
        return redirect()->route('outlet.stock.index', $this->outlet);
    }
}
