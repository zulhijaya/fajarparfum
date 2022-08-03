<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use App\Models\Outlet;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    public $name, $phone;
    
    protected $rules = [
        'name' => 'required'
    ];

    public function render()
    {
        return view('livewire.member.create')->layoutData([
            'titles' => [
                [
                    'name' => 'Member',
                    'route' => 'member.index'
                ],
                [
                    'name' => 'Tambah Member'
                ]
            ],
            'create' => [
                'route' => ''
            ]
        ]);
    }

    public function create() 
    {
        $this->validate();

        $member = User::create([
            'name' => Str::title($this->name),
            'phone' => $this->phone,
            'role' => 'member'
        ]);
        
        session()->flash('message', [$member->name, 'ditambahkan']);
    
        return redirect()->route('member.index');
    }
}
