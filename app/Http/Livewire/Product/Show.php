<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Show extends Component
{
    public Product $product;
    
    public function render()
    {
        return view('livewire.product.show')->layoutData([
            'titles' => [
                [
                    'name' => 'Produk',
                    'route' => 'product.index'
                ],
                [
                    'name' => $this->product->name
                ]
            ],
            'create' => [
                'route' => ''
            ]
        ]);
    }
}
