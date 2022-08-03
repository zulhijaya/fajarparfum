<?php

namespace App\Http\Livewire\Outlet\Stock;

use App\Models\Outlet;
use App\Models\Product;
use Livewire\Component;

class create extends Component
{
    public Outlet $outlet;
    public $product_ids = [];
    public $selectAll = false;

    protected $rules = [
        'product_ids' => 'required|array|min:1'
    ];

    public function messages()
    {
        return [
            'product_ids.required' => 'Harus pilih minimal 1 parfum'
        ];
    }

    public function render()
    {
        $products = Product::with('subcategory')->whereDoesntHave('outlets', function($query) {
            $query->where('outlet_id', $this->outlet->id);
        })->get()->groupBy('subcategory.name');

        return view('livewire.outlet.stock.create', [
            'products' => $products
        ])->layoutData([
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
                    'name' => 'Tambah Stok'
                ]
            ],
            'create' => [
                'route' => ''
            ]
        ]);
    }

    public function updatedSelectAll($value)
    {
        if( $value ) {
            $this->product_ids = Product::whereDoesntHave('outlets', function($query) {
                $query->where('outlets.id', $this->outlet->id);
            })->pluck('id')->toArray();
        } else {
            $this->product_ids = [];
        }
    }

    public function store()
    {
        $this->validate();

        $this->outlet->products()->attach($this->product_ids, ['stock' => 0]);
        
        session()->flash('message', ['Barang di ' . $this->outlet->name, 'ditambahkan']);
    
        return redirect()->route('outlet.stock.index', $this->outlet);
    }
}