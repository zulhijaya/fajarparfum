<?php

namespace App\Http\Livewire\RefillPrice;

use App\Models\RefillPrice;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $refill_prices = RefillPrice::orderBy('bottle')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'bottle' => $item->bottle,
                'prices' => collect(explode(", ", $item->prices))->map(function($price) {
                    return number_format($price, 0, '.', '.');
                })
            ];
        });

        return view('livewire.refill-price.index', [
            'refill_prices' => $refill_prices
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Harga Parfum Refill'
                ]
            ],
            'create' => [
                'route' => 'refill-price.create',
                'parameter' => ''
            ]
        ]);
    }

    public function delete(RefillPrice $refill_price)
    {
        $bottle = $refill_price->bottle;
        $refill_price->delete();
        
        session()->flash('message', ['Harga untuk botol ' . $bottle . 'ml', 'dihapus']);
    
        return redirect()->route('refill-price.index');
    }
}
