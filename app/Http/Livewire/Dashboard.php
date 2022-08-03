<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Outlet;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $outlet_id;

    public function render()
    {
        $orders = Order::with('user:id,name', 'outlet:id,name', 'order_details.products')->when($this->outlet_id, function($query) {
                    $query->where('outlet_id', $this->outlet_id);
                })->whereDate('created_at', date('Y-m-d'))->get();

        $total = [
            'perfume' => Product::where('subcategory_id', 1)->count(),
            'member' => User::where('role', 'member')->count(),
            'seeds_sold' => Product::withSum('order_details as total_seeds_sold', 'ordered_products.seed')->get()->sum('total_seeds_sold'),
        ];

        $products = Product::with(['order_details' => function($query) {
            $query->whereDate('order_details.created_at', date('Y-m-d'));
        }])->withSum(['order_details as total_seeds_sold' => function($query) {
            $query->whereDate('order_details.created_at', date('Y-m-d'));
        }], 'ordered_products.seed')->whereHas('order_details', function($query) {
            $query->whereDate('order_details.created_at', date('Y-m-d'))->when($this->outlet_id, function($query) {
                $query->whereHas('order', function($query) {
                    $query->where('outlet_id', $this->outlet_id);
                });
            });
        })->where('subcategory_id', 1)->orderBy('total_seeds_sold', 'DESC')->get();
        
        $this_week = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total');

        $incomes = Order::select(DB::raw('SUM(CASE WHEN created_at LIKE "'. date("Y-m-d") . '%" THEN total END) as today, SUM(CASE WHEN created_at LIKE "'. date("Y-m") . '%" THEN total END) as this_month, SUM(CASE WHEN created_at LIKE "'. date("Y") . '%" THEN total END) as this_year, SUM(total) as total'))->first();

        $outlets = Outlet::select('id', 'name')->where('status', 'buka')->get();

        return view('livewire.dashboard', [
            'orders' => $orders,
            'products' => $products,
            'outlets' => $outlets,
            'total' => $total,
            'incomes' => $incomes,
            'this_week' => $this_week
        ])->layoutData([
            'titles' => [],
            'create' => [
                'route' => ''
            ]
        ]);
    }
}