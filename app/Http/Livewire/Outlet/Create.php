<?php

namespace App\Http\Livewire\Outlet;

use App\Models\User;
use App\Models\Outlet;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public $name, $address, $type, $status;

    protected $rules = [
        'name' => 'required',
        'address' => 'required',
        'type' => 'required',
        'status' => 'required',
    ];

    public function render()
    {
        $employees = User::where('role', 'employee')->get();
        
        return view('livewire.outlet.create', [
            'employees' => $employees
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Toko',
                    'route' => 'outlet.index'
                ],
                [
                    'name' => 'Tambah Toko',
                    'route' => 'outlet.create'
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

        $result = Outlet::where('type', 'toko utama')->first();
        if( $result && $this->type == 'toko utama' ) $result->update(['type' => 'cabang']);

        $outlet = Outlet::create([
            'name' => Str::title($this->name),
            'address' => $this->address,
            'type' => $this->type,
            'status' => $this->status
        ]);
        
        session()->flash('message', [$outlet->name, 'ditambahkan']);
    
        return redirect()->route('outlet.index');
    }
}
