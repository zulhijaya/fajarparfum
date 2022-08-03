<?php

namespace App\Http\Livewire\Outlet;

use App\Models\User;
use App\Models\Outlet;
use Livewire\Component;
use Illuminate\Support\Str;

class Edit extends Component
{
    public Outlet $outlet;
    public $current_employees;

    protected $rules = [
        'outlet.name' => 'required',
        'outlet.address' => 'required',
        'outlet.type' => 'required',
        'outlet.status' => 'required'
    ];

    public function mount()
    {
        $this->current_employees = $this->outlet->load('users')->users->pluck('id')->toArray();
    }

    public function render()
    {   
        $employees = User::where('role', 'employee')->get();
        $outlets_count = Outlet::count();
        
        return view('livewire.outlet.edit', [
            'employees' => $employees,
            'outlets_count' => $outlets_count
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Toko',
                    'route' => 'outlet.index'
                ],
                [
                    'name' => 'Edit Toko',
                    'route' => 'outlet.edit'
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

        if( $this->outlet->type == 'toko utama' ) {
            $result = Outlet::where('type', 'toko utama')->first();
            if( $this->outlet->id != $result->id ) $result->update(['type' => 'cabang']);
        }

        $this->outlet->update([
            'name' => Str::title($this->outlet->name),
            'address' => $this->outlet->address,
            'type' => $this->outlet->type,
            'status' => $this->outlet->status
        ]);
        
        session()->flash('message', [$this->outlet->name, 'diupdate']);
    
        return redirect()->route('outlet.index');
    }
}
