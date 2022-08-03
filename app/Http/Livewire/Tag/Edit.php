<?php

namespace App\Http\Livewire\Tag;

use App\Models\Tag;
use Livewire\Component;

class Edit extends Component
{
    public Tag $tag;
    
    protected $rules = [
        'tag.name' => 'required'
    ];

    public function messages()
    {
        return [
            'name.required' => 'Nama penanda tidak boleh kosong'
        ];
    }

    public function render()
    {
        return view('livewire.tag.edit')->layoutData([
            'titles' => [
                [
                    'name' => 'Penanda',
                    'route' => 'tag.index'
                ],
                [
                    'name' => 'Edit Penanda'
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

        $this->tag->update([
            'name' => $this->tag->name
        ]);
        
        session()->flash('message', [$this->tag->name, 'diupdate']);
    
        return redirect()->route('tag.index');
    }
}