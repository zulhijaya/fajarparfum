<?php

namespace App\Http\Livewire\Tag;

use App\Models\Tag;
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
            'name.required' => 'Nama penanda tidak boleh kosong'
        ];
    }
    
    public function render()
    {
        return view('livewire.tag.create')->layoutData([
            'titles' => [
                [
                    'name' => 'Penanda',
                    'route' => 'tag.index'
                ],
                [
                    'name' => 'Tambah Penanda'
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

        $tag = Tag::create([
            'name' => $this->name,
        ]);
        
        session()->flash('message', [$tag->name, 'ditambahkan']);
    
        return redirect()->route('tag.index');
    }
}