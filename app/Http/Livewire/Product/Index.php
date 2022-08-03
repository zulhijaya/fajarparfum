<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Subcategory;

class Index extends Component
{
    public $name, $subcategory_id;

    protected $queryString = [
        'name' => ['except' => ''],
        'subcategory_id' => ['except' => '']
    ];

    public function render()
    {   
        $subcategories = Subcategory::select('id', 'name')->get();

        $products = Product::with('subcategory.category')
                    ->withCount('wholesale_prices', 'outlets')
                    ->withSum('outlets as total_stock', 'stocks.stock')
                    ->when($this->name, function($query) {
                        $query->where(function($query) {
                            $query->where('name', 'LIKE', '%' . $this->name . '%')->orWhere('other_name', 'LIKE', '%' . $this->name . '%');
                        })->orWhere(function($query) {
                            $query->whereHas('tags', function($query) {
                                $query->where('name', 'LIKE', '%' . $this->name . '%');
                            });
                        });
                    })->when($this->subcategory_id, function($query) {
                        $query->where('subcategory_id', $this->subcategory_id);
                    })->orderBy('subcategory_id')->orderBy('name')->get()->groupBy(['subcategory.category.name', 'subcategory.name']);

        return view('livewire.product.index', [
            'subcategories' => $subcategories,
            'products' => $products
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Produk'
                ]
            ],
            'create' => [
                'route' => 'product.create',
                'parameter' => ''
            ]
        ]);
    }

    public function delete(Product $product)
    {
        $name = $product->name;
        $product->tags()->detach();
        $product->delete();
        
        session()->flash('message', [$name, 'dihapus']);
    
        return redirect()->route('product.index');
    }

    public function resetSearching()
    {
        $this->reset(['name', 'subcategory_id']);
    }
}
