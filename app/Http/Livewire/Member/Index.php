<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $members = User::where('role', 'member')->get();

        return view('livewire.member.index', [
            'members' => $members
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Member'
                ]
            ],
            'create' => [
                'route' => 'member.create',
                'parameter' => ''
            ]
        ]);
    }
}
