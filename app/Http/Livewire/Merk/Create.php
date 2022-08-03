<?php

namespace App\Http\Livewire\Merk;

use App\Models\Merk;
use Livewire\Component;

class Create extends Component
{
    public $name;
    
    protected $rules = [
        'name' => 'required',
    ];

    public function messages()
    {
        return [
            'name.required' => 'Nama merek tidak boleh kosong'
        ];
    }
    
    public function render()
    {
        return view('livewire.merk.create')->layoutData([
            'titles' => [
                [
                    'name' => 'Merk',
                    'route' => 'merk.index'
                ],
                [
                    'name' => 'Tambah Merk'
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

        $merk = Merk::create([
            'name' => $this->name,
        ]);
        
        session()->flash('message', [$merk->name, 'ditambahkan']);
    
        return redirect()->route('merk.index');
    }
}
