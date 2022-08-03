<?php

namespace App\Http\Livewire\Product\WholesalePrice;

use App\Models\Merk;
use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public Product $product;
    public $merk_id, $amount, $unit, $price;
    
    protected $rules = [
        'merk_id' => 'required',
        // 'amount' => 'required',
        // 'unit' => 'required',
        'price' => 'required'
    ];

    public function messages()
    {
        return [
            'merk_id.required' => 'Merek tidak boleh kosong',
            // 'amount.required' => 'Ukuran tidak boleh kosong',
            // 'unit.required' => 'Satuan tidak boleh kosong',
            'price.required' => 'Harga tidak boleh kosong',
        ];
    }

    public function render()
    {   
        $merks = Merk::select('id', 'name')->get();

        return view('livewire.product.wholesale-price.create', [
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
                    'name' => 'Tambah Harga Grosir'
                ]
            ],
            'create' => [
                'route' => ''
            ]
        ]);
    }

    public function store()
    {
        $this->validate();

        $this->product->wholesale_prices()->attach($this->merk_id, [
            'amount' => $this->amount,
            'unit' => $this->unit,
            'price' => $this->price
        ]);

        // $this->product->wholesale_prices()->attach($this->merk_id, [
        //     'amount' => 1000,
        //     'unit' => 'ml',
        //     'price' => $this->price
        // ]);

        // $this->product->wholesale_prices()->attach($this->merk_id, [
        //     'amount' => 500,
        //     'unit' => 'ml',
        //     'price' => ($this->price / 2) + 10000 
        // ]);

        // $this->product->wholesale_prices()->attach($this->merk_id, [
        //     'amount' => 250,
        //     'unit' => 'ml',
        //     'price' => ($this->price / 4) + 10000 
        // ]);
        
        session()->flash('message', ['Harga grosir ' . $this->product->name, 'ditambahkan']);
    
        return redirect()->route('product.wholesale-price.index', $this->product);
    }
}