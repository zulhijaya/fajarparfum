<?php

namespace App\Http\Livewire\Merk;

use App\Models\Merk;
use Livewire\Component;

class Edit extends Component
{
    public Merk $merk;
    
    protected $rules = [
        'merk.name' => 'required'
    ];

    public function messages()
    {
        return [
            'name.required' => 'Nama merek tidak boleh kosong'
        ];
    }

    public function render()
    {
        return view('livewire.merk.edit')->layoutData([
            'titles' => [
                [
                    'name' => 'Merek',
                    'route' => 'merk.index'
                ],
                [
                    'name' => 'Edit Merek'
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

        $this->merk->update([
            'name' => $this->merk->name
        ]);
        
        session()->flash('message', [$this->merk->name, 'diupdate']);
    
        return redirect()->route('merk.index');
    }
}
