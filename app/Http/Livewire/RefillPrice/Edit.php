<?php

namespace App\Http\Livewire\RefillPrice;

use App\Models\RefillPrice;
use Livewire\Component;

class Edit extends Component
{
    public RefillPrice $refill_price;
    
    protected $rules = [
        'refill_price.bottle' => 'required',
        'refill_price.prices' => 'required'
    ];

    public function messages()
    {
        return [
            'refill_price.bottle.required' => 'Ukuran botol tidak boleh kosong',
            'refill_price.prices.required' => 'Harga tidak boleh kosong'
        ];
    }

    public function render()
    {
        return view('livewire.refill-price.edit')->layoutData([
            'titles' => [
                [
                    'name' => 'Harga Parfum Refill',
                    'route' => 'refill-price.index'
                ],
                [
                    'name' => 'Edit Harga'
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

        $this->refill_price->update([
            'bottle' => $this->refill_price->bottle,
            'prices' => $this->refill_price->prices
        ]);
        
        session()->flash('message', ['Harga untuk botol ' . $this->refill_price->bottle . 'ml', 'diupdate']);
    
        return redirect()->route('refill-price.index');
    }
}
