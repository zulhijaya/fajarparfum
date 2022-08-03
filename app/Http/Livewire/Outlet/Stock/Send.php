<?php

namespace App\Http\Livewire\Outlet\Stock;

use App\Models\Send as SendReport;
use App\Models\Outlet;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Send extends Component
{
    public Outlet $outlet;
    public $search;
    public $outlet_id;

    protected $queryString = [
        'search' => ['except' => '']
    ];
    
    public function render()
    { 
        $outlets = Outlet::select('id', 'name')->where('id', '!=', $this->outlet->id)->get();

        $products = $this->outlet->products()->with('subcategory.category')
                        ->when($this->search, function($query) {
                            $query->where(function($query) {
                                    $query->where('name', 'LIKE', '%' . $this->search . '%')->orWhere('other_name', 'LIKE', '%' . $this->search . '%');
                            })->orWhere(function($query) {
                                $query->whereHas('tags', function($query) {
                                    $query->where('name', 'LIKE', '%' . $this->search . '%');
                                });
                            });
                        })->orderBy('subcategory_id')->orderBy('name')->get()->groupBy('subcategory.name');
        // dd($products);

        return view('livewire.outlet.stock.send', [
            'outlets' => $outlets,
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
                    'name' => 'Kirim Stok'
                ]
            ],
            'create' => [
                'route' => ''
            ]
        ]);
    }

    public function getOutletNameProperty()
    {
        return $this->outlet_id ? Outlet::select('name')->find($this->outlet_id)->name : '';
    }

    public function send($sends) 
    {
        $product_ids = collect($sends)->pluck('product.id')->toArray();
        $to_outlet = Outlet::find($this->outlet_id);
        $to_outlet->products()->syncWithoutDetaching($product_ids);
        
        $send_report = SendReport::create([
            'user_id' => auth()->user()->id,
            'outlet_id' => $this->outlet_id,
        ]);
        
        foreach( $sends as $send ) {
            $from_outlet_stock = $send['product']['pivot']['stock'];
            $category_id = $send['product']['subcategory']['category_id'];
            
            if( $from_outlet_stock >= $send['qty'] || $category_id != 1 ) {
                if( $category_id == 1 ) {
                    $to_outlet_stock = $to_outlet->products()->find($send['product']['id'])->pivot->stock;
                    $to_outlet->products()->updateExistingPivot($send['product']['id'], [
                        'stock' => $to_outlet_stock + $send['qty']
                    ]); 
                    
                    $this->outlet->products()->updateExistingPivot($send['product']['id'], [
                        'stock' => $from_outlet_stock - $send['qty']
                    ]); 
                }
    
                $send_report->send_details()->create([
                    'product_id' => $send['product']['id'],
                    'qty'  => $send['qty'],
                    'unit'  => $send['unit']
                ]);
            } else {
                $send_report->delete();
            }
        }
        
        session()->flash('message', ['Stok ke ' . $to_outlet->name, 'dikirim']);
    
        return redirect()->route('outlet.index');
    }
}