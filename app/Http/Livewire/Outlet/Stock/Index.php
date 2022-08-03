<?php

namespace App\Http\Livewire\Outlet\Stock;

use App\Models\Outlet;
use App\Models\Product;
use Livewire\Component;
use App\Models\Subcategory;

class Index extends Component
{
    public Outlet $outlet;
    public $name, $subcategory_id;

    protected $queryString = [
        'name' => ['except' => ''],
        'subcategory_id' => ['except' => '']
    ];

    public function render()
    {
        $subcategories = Subcategory::select('id', 'name')->get();

        $products = $this->outlet->products()->with('subcategory.category')->when($this->name, function($query) {
                        $query->where(function($query) {
                                $query->where('name', 'LIKE', '%' . $this->name . '%')->orWhere('other_name', 'LIKE', '%' . $this->name . '%');
                        })->orWhere(function($query) {
                            $query->whereHas('tags', function($query) {
                                $query->where('name', 'LIKE', '%' . $this->name . '%');
                            });
                        });
                    })->when($this->subcategory_id, function($query) {
                        $query->where('subcategory_id', $this->subcategory_id);
                    })->orderBy('name')->get()->groupBy(['subcategory.category.name', 'subcategory.name']);
                    
        return view('livewire.outlet.stock.index', [
            'subcategories' => $subcategories,
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
                    'name' => 'Stok'
                ]
            ],
            'create' => [
                'route' => 'outlet.stock.create',
                'parameter' => $this->outlet
            ]
        ]);
    }

    public function delete(Product $product)
    {
        $this->outlet->products()->detach($product->id);
        
        session()->flash('message', [$product->name . ' di ' . $this->outlet->name, 'dihapus']);
    
        return redirect()->route('outlet.stock.index', $this->outlet);
    }

    public function resetSearching()
    {
        $this->reset(['name', 'subcategory_id']);
    }
}