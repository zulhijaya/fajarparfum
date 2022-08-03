<?php

namespace App\Http\Livewire\Order;

use App\Models\User;
use App\Models\Order;
use App\Models\Outlet;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\RefillPrice;
use Illuminate\Support\Str;

class Wholesale extends Component
{
    public $outlet, $search_product, $search_member;

    protected $queryString = [
        'search_product' => ['except' => ''],
        'search_member' => ['except' => '']
    ];

    public function mount()
    {
        $this->outlet = Outlet::where('type', 'toko utama')->first();
    }

    public function render()
    {
        $products = $this->outlet->products()->with('wholesale_prices', 'subcategory.category')
                    ->when($this->search_product, function($query) {
                        $query->where(function($query) {
                                $query->where('name', 'LIKE', '%' . $this->search_product . '%')->orWhere('other_name', 'LIKE', '%' . $this->search_product . '%');
                        })->orWhere(function($query) {
                            $query->whereHas('tags', function($query) {
                                $query->where('name', 'LIKE', '%' . $this->search_product . '%');
                            });
                        });
                    })->orderBy('subcategory_id')->orderBy('name')->get()->groupBy('subcategory.name');
        
        $bottles = RefillPrice::pluck('bottle')->toArray();
        
        $members = User::where('role', 'member')->when($this->search_member, function($query) {
            $query->where('name', 'LIKE', '%' . $this->search_member . '%')->orWhere('phone', 'LIKE', '%' . $this->search_member . '%');
        })->orderBy('name')->get()->groupBy(function($item) {
            return substr($item['name'], 0, 1);
        });
        
        return view('livewire.order.wholesale', [
            'products' => $products,
            'bottles' => $bottles,
            'members' => $members
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Order Grosir',
                    'route' => 'order.wholesale'
                ]
            ],
            'create' => [
                'route' => ''
            ]
        ]);
    }

    public function order($old_orders, $member) 
    {
        $orders = collect($old_orders);
        $latest_order = Order::select('id', 'order_number', 'invoice')->where('invoice', 'LIKE', 'G-' . '%')->latest()->first();
        
        $order_number = $latest_order ? ($latest_order->order_number + 1) : 1;
        $invoice = 'G-' . Str::padLeft($order_number, 8, '0');
        
        $total = $orders->sum(function ($order) {
            return $order['price'] * $order['qty'];
        });

        if( !$member['id'] ) {
            if( !$member['phone'] ) $member['phone'] = '08' . mt_rand(1000000000,9999999999);
            $newMember = User::create([
                'name' => Str::title($member['name']),
                'phone' => $member['phone'],
                'role' => 'member'
            ]);
            
            $member['id'] = $newMember->id;
        }

        $cash = intval(str_replace('.', '', $member['cash']));

        $processed_order = Order::create([
            'user_id' => $member['id'],
            'outlet_id' => $this->outlet->id,
            'order_number' => $order_number,
            'invoice' => $invoice,
            'type' => 'grosir',
            'total' => $total,
            'cash' => $cash,
            'change' => $cash - $total
        ]);
        
        foreach( $orders as $order ) {
            $order_detail = $processed_order->order_details()->create([
                'merk' => $order['merkName'],
                'dosing_type' => $order['dosingType'],
                'bottle' => $order['bottle'],
                'amount' => $order['merkAmount'],
                'unit' => $order['unit'],
                'price' => $order['price'],
                'qty' => $order['qty'],
            ]);
            
            foreach( $order['products'] as $product ) {
                $order_detail->ordered_products()->attach($product['id'], [
                    'seed' => $order['seed'],
                    'qty' => $product['qty'],
                ]);

                $target = $this->outlet->products()->with('subcategory.category')->find($product['id']);
                if( $target->subcategory->category->name == 'Parfum' ) {
                    if( count($order['products']) > 1 ) $reduced_stock = $order['seed'] * $product['qty'] * $order['qty'];
                    else $reduced_stock = $order['merkAmount'] * $order['qty'];

                    $this->outlet->products()->updateExistingPivot($product['id'], ['stock' => $target->pivot->stock - $reduced_stock]);
                }
            }
        }

        $result = [
            'name' => Str::title($member['name']),
            'total' => $total,
            'cash' => $cash,
            'change' => $processed_order->change
        ];
        
        return $result;
    }
}