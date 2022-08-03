<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\Outlet;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{
    public $name, $phone, $email, $password, $password_confirmation, $outlet_ids = [], $role, $working_hours;

    protected $rules = [
        'name' => 'required',
        'phone' => 'required|unique:users|min:11',
        'password' => 'required|min:8|confirmed',
        'outlet_ids' => 'required',
        'role' => 'required',
        'working_hours' => 'required_if:role,employee'
    ];

    public function render()
    {
        $outlets = Outlet::select('id', 'name', 'type')->get();
        
        return view('livewire.user.create', [
            'outlets' => $outlets
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'User',
                    'route' => 'user.index'
                ],
                [
                    'name' => 'Tambah User'
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

        $user = User::create([
            'name' => Str::title($this->name),
            'phone' => $this->phone,
            'email' => Str::lower($this->email),
            'password' => Hash::make($this->password),
            'role' => $this->role,
            'working_hours' => $this->working_hours,
            'status' => 'bekerja'
        ]);

        $user->outlets()->attach($this->outlet_ids);
        
        session()->flash('message', [$user->name, 'ditambahkan']);
    
        return redirect()->route('user.index');
    }
}
