<?php

namespace App\Http\Livewire\RefillPrice;

use Livewire\Component;
use App\Models\RefillPrice;

class Create extends Component
{
    public $bottle, $prices;
    
    protected $rules = [
        'bottle' => 'required',
        'prices' => 'required'
    ];

    public function messages()
    {
        return [
            'bottle.required' => 'Ukuran botol tidak boleh kosong',
            'prices.required' => 'Harga tidak boleh kosong'
        ];
    }

    public function render()
    {
        return view('livewire.refill-price.create')->layoutData([
            'titles' => [
                [
                    'name' => 'Harga Parfum Refill',
                    'route' => 'refill-price.index'
                ],
                [
                    'name' => 'Tambah Harga'
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

        $refill_price = RefillPrice::create([
            'bottle' => $this->bottle,
            'prices' => $this->prices
        ]);
        
        session()->flash('message', ['Harga untuk botol ' . $refill_price->bottle . 'ml', 'ditambahkan']);
    
        return redirect()->route('refill-price.index');
    }
}
