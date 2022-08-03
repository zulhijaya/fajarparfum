<?php

namespace App\Http\Livewire\Report;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Outlet;
use Livewire\Component;

class Transaction extends Component
{
    public $filter = [
        'outlet_id' => '',
        'type' => '',
        'day' => '',
        'month' => '',
        'year' => ''
    ];

    public function mount() 
    {
        $this->filter['month'] = date('m');
        $this->filter['year ']= date('Y');
    }

    public function render()
    {
        $orders = Order::with('user:id,name', 'outlet:id,name', 'order_details.products')->withSum('order_details as total_qty', 'qty')->when($this->filter['outlet_id'], function($query) {
                    $query->where('outlet_id', $this->filter['outlet_id']);
                })->when($this->filter['type'], function($query) {
                    $query->where('type', $this->filter['type']);
                })->when($this->filter['day'] || $this->filter['month'] || $this->filter['year'], function($query) {
                    $query->where('created_at', 'LIKE', '%' . $this->filter['year'] . '-' . $this->filter['month'] . '-' . $this->filter['day'] . '%');
                })->orderBy('created_at', 'DESC')->get()->groupBy(function ($item) {
                    return Carbon::parse($item['created_at'])->isoFormat('D MMMM Y');
                });

        $outlets = Outlet::select('id', 'name')->get();
        
        return view('livewire.report.transaction', [
            'orders' => $orders,
            'outlets' => $outlets
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Laporan Transaksi',
                    'route' => 'report.transaction'
                ]
            ],
            'create' => [
                'route' => ''
            ]
        ]);
    }
}
