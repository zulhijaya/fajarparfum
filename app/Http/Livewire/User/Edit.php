<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\Outlet;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    public User $user;
    public $password, $password_confirmation;
    public $old_role, $outlet_ids = [];

    protected $rules = [
        'user.name' => 'required',
        'user.phone' => 'required|min:11',
        'user.email' => 'nullable',
        'user.role' => 'required',
        'user.working_hours' => 'required_if:role,employee',
        'user.status' => 'required_if:role,employee',
        'password' => 'required_with:password_confirmation|confirmed',
        'outlet_ids' => 'required'
    ];

    public function mount()
    {
        $this->old_role = $this->user->role;
        $this->outlet_ids = $this->user->outlets->pluck('id')->toArray();
    }

    public function render()
    {
        $outlets = Outlet::get();
        
        return view('livewire.user.edit', [
            'outlets' => $outlets
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'User',
                    'route' => 'user.index'
                ],
                [
                    'name' => 'Edit User'
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
        $this->validate([
            'user.phone' => Rule::unique('users', 'phone')->ignore($this->user->id),
        ]);

        $this->user->update([
            'name' => Str::title($this->user->name),
            'phone' => $this->user->phone,
            'email' => $this->user->email,
            'role' => $this->user->role,
            'working_hours' => $this->user->role == 'employee' ? $this->user->working_hours : NULL,
            'status' => $this->user->role == 'employee' ? $this->user->status : NULL,
        ]);

        $this->user->outlets()->sync($this->outlet_ids);

        if( $this->password ) {
            $this->user->update([
                'password' => Hash::make($this->password)
            ]);
        }
        
        session()->flash('message', [$this->user->name, 'diupdate']);
    
        return redirect()->route('user.index');
    }
}
