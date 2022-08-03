<?php

namespace App\Http\Livewire\Order;

use App\Models\User;
use App\Models\Order;
use App\Models\Outlet;
use Livewire\Component;
use App\Models\RefillPrice;
use Illuminate\Support\Str;

class Retail extends Component
{
    public $target_outlet, $search_product, $search_member;

    protected $queryString = [
        'search_product' => ['except' => ''],
        'search_member' => ['except' => '']
    ];

    public function mount() 
    {
        $outlets = auth()->user()->outlets;
        if( $outlets->count() == 1 ) $this->target_outlet = $outlets->first();
    }

    public function render()
    {
        $products = [];
        if( $this->target_outlet ) {
            $products = $this->target_outlet->products()->with('subcategory.category')
                        ->when($this->search_product, function($query) {
                            $query->where(function($query) {
                                    $query->where('name', 'LIKE', '%' . $this->search_product . '%')->orWhere('other_name', 'LIKE', '%' . $this->search_product . '%');
                            })->orWhere(function($query) {
                                $query->whereHas('tags', function($query) {
                                    $query->where('name', 'LIKE', '%' . $this->search_product . '%');
                                });
                            });
                        })->orderBy('subcategory_id')->orderBy('name')->get()->groupBy('subcategory.name');
        }
        
        $bottles = RefillPrice::select('id', 'bottle', 'prices')->orderBy('bottle')->get();
        
        $members = User::where('role', 'member')->when($this->search_member, function($query) {
            $query->where('name', 'LIKE', '%' . $this->search_member . '%')->orWhere('phone', 'LIKE', '%' . $this->search_member . '%');
        })->orderBy('name')->get()->groupBy(function($item) {
            return substr($item['name'], 0, 1);
        });

        $outlets = auth()->user()->outlets()->where('status', 'buka')->get();
        
        return view('livewire.order.retail', [
            'products' => $products,
            'bottles' => $bottles,
            'members' => $members,
            'outlets' => $outlets
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Order Eceran',
                    'route' => 'order.retail'
                ]
            ],
            'create' => [
                'route' => ''
            ]
        ]);
    }

    public function setOutlet($id) 
    {
        $this->target_outlet = Outlet::find($id);
    }

    public function getMemberOrders(User $member)
    {
        $orders = $member->order_details()->with('ordered_products')->where('price', '>=', 50000)
                    ->whereHas('order', function($query) {
                        $query->where('type', 'eceran');
                    })
                    ->whereHas('ordered_products', function($query) {
                        $query->whereHas('subcategory', function($query) {
                            $query->where('name', 'Parfum Refill');
                        });
                    })
                    ->get();

        $chunks = $orders->chunk(5)->map(function($item) {
            return $item->mapWithKeys(function ($order, $key) {
                return [$key % 5 => $order];
            });
        })->toArray();

        return $chunks;
    }

    public function order($old_orders, $member, $bonuses) 
    {
        $orders = collect($old_orders);
        $latest_order = Order::select('id', 'order_number', 'invoice')->where('invoice', 'LIKE', 'E-' . '%')->latest()->first();
        
        $order_number = $latest_order ? ($latest_order->order_number + 1) : 1;
        $invoice = 'E-' . Str::padLeft($order_number, 8, '0');
        
        $total = $orders->sum(function ($order) {
            return $order['price'] * $order['qty'];
        });

        if( $member['name'] && !$member['id'] ) {
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
            'user_id' => $member['id'] ? $member['id'] : NULL,
            'outlet_id' => $this->target_outlet->id,
            'order_number' => $order_number,
            'invoice' => $invoice,
            'type' => 'eceran',
            'total' => $total,
            'cash' => $cash,
            'change' => $cash - $total
        ]);
        
        foreach( $orders as $order ) {
            $qty = $order['products'][0]['subcategory'] == 'Parfum Refill' ? 1 : $order['qty'];

            $order_detail = $processed_order->order_details()->create([
                'dosing_type' => $order['dosingType'],
                'bottle' => $order['bottle'],
                'price' => $order['price'],
                'qty' => $qty,
            ]);
            
            foreach( $order['products'] as $product ) {
                $order_detail->ordered_products()->attach($product['id'], [
                    'seed' => $product['subcategory'] == 'Parfum Refill' ? $product['seed'] : NULL
                ]);

                $target = $this->target_outlet->products()->with('subcategory.category')->find($product['id']);
                if( $target->subcategory->category->name == 'Parfum' ) {
                    $reduced_stock = ($product['subcategory'] == 'Parfum Refill' ? $product['seed'] : 1) * $order['qty'];

                    $this->target_outlet->products()->updateExistingPivot($product['id'], ['stock' => $target->pivot->stock - $reduced_stock]);
                }
            }
            
            if( $order['products'][0]['subcategory'] == 'Parfum Refill' && $order['qty'] > 1 ) {
                for( $i = 2; $i <= $order['qty']; $i++ ) {
                    $order_detail->load('ordered_products');
                    $new_order = $order_detail->replicate();
                    $new_order->push();
                    foreach( $order_detail->ordered_products as $product ) {
                        $new_order->ordered_products()->attach($product->id, [
                            'seed' => $product->pivot->seed
                        ]);
                    }
                }
        
                $new_order->save();
            }
        }
        
        foreach( $bonuses as $bonus ) {
            $bonus_detail = $processed_order->order_details()->create([
                'dosing_type' => $bonus['dosingType'],
                'bottle' => $bonus['bottle'],
                'price' => 0,
                'qty' => $bonus['qty'],
            ]);
            
            foreach( $bonus['products'] as $product ) {
                $bonus_detail->ordered_products()->attach($product['id'], [
                    'seed' => $product['seed']
                ]);

                $target = $this->target_outlet->products()->with('subcategory.category')->find($product['id']);
                if( $target->subcategory->category->name == 'Parfum' ) {
                    $reduced_stock = $product['seed'] * $bonus['qty'];

                    $this->target_outlet->products()->updateExistingPivot($product['id'], ['stock' => $target->pivot->stock - $reduced_stock]);
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