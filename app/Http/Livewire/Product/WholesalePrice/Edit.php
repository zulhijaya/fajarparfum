<?php

namespace App\Http\Livewire\Product\WholesalePrice;

use App\Models\Product;
use Livewire\Component;

class Edit extends Component
{
    public Product $product;
    public $merk_id, $wholesale_price;
    
    protected $rules = [
        'wholesale_price.price.*' => 'required'
    ];

    public function messages()
    {
        return [
            'wholesale_price.price' => 'Harga tidak boleh kosong'
        ];
    }

    public function mount($merk)
    {
        $wholesale_prices = $this->product->load(['wholesale_prices' => function ($query) use ($merk) {
            $query->where('merk_id', $merk);
        }])->wholesale_prices;
        
        $this->wholesale_price['size'] = $wholesale_prices->pluck('pivot.size')->toArray();
        $this->wholesale_price['price'] = $wholesale_prices->pluck('pivot.price')->toArray();
        $this->merk_id = $merk;
    }

    public function render()
    {   
        return view('livewire.product.wholesale-price.edit')->layoutData([
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
                    'name' => 'Edit Harga Grosir'
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

        $this->product->wholesale_prices()->detach($this->merk_id);
        
        for( $i = 0; $i < count($this->wholesale_price['size']); $i++ ) {
            $this->product->wholesale_prices()->attach($this->merk_id, [
                'size' => $this->wholesale_price['size'][$i],
                'price' => $this->wholesale_price['price'][$i],
            ]);
        }
        
        session()->flash('message', ['Harga grosir ' . $this->product->name, 'diupdate']);
    
        return redirect()->route('product.wholesale-price.index', $this->product);
    }
}