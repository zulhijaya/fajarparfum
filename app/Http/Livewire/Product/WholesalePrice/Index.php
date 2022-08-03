<?php

namespace App\Http\Livewire\Product\WholesalePrice;

use App\Models\Merk;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public Product $product;

    public function render()
    {   
        // $merks = Merk::with('wholesale_prices')->withCount('wholesale_prices')->whereHas('wholesale_prices', function($query) {
        //     $query->where('product_id', $this->product->id);
        // })->get();

        $merks = $this->product->wholesale_prices()->withCount('wholesale_prices')->whereHas('wholesale_price', function($query) {
            $query->where('product_id', $this->product->id);
        })->get();

        $merks = $this->product->wholesale_prices->orderBy('name');

        return view('livewire.product.wholesale-price.index', [
            'merks' => $merks
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Produk',
                    'route' => 'product.index'
                ],
                [
                    'name' => $this->product->name,
                    'route' => 'product.index'
                ],
                [
                    'name' => 'Harga Grosir'
                ]
            ],
            'create' => [
                'route' => 'product.wholesale-price.create',
                'parameter' => $this->product
            ]
        ]);
    }

    public function delete($merk) 
    {
        $this->product->wholesale_prices()->detach($merk['id']);
        
        session()->flash('message', ['Harga grosir ' . $merk['name'], 'dihapus']);
    
        return redirect()->route('product.wholesale-price.index', $this->product);
    }
}
