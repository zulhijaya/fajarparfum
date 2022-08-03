<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $users = User::where('role', '!=', 'employee')->where('role', '!=', 'member')->orderBy('role')->get();
        $employees = User::with('outlets:id,name')->where('role', 'employee')->get();

        return view('livewire.user.index', [
            'users' => $users,
            'employees' => $employees
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'User'
                ]
            ],
            'create' => [
                'route' => 'user.create',
                'parameter' => ''
            ]
        ]);
    }

    public function delete(User $user)
    {
        $name = $user->name;
        $user->delete();
        
        session()->flash('message', [$name, 'dihapus']);
    
        return redirect()->route('user.index');
    }
}
