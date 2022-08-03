<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    public Category $category;
    
    protected $rules = [
        'category.name' => 'required'
    ];

    public function messages()
    {
        return [
            'name.required' => 'Nama kategori tidak boleh kosong'
        ];
    }

    public function render()
    {
        return view('livewire.category.edit')->layoutData([
            'titles' => [
                [
                    'name' => 'Kategori',
                    'route' => 'category.index'
                ],
                [
                    'name' => 'Edit Kategori'
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

        $this->category->update([
            'name' => $this->category->name
        ]);
        
        session()->flash('message', [$this->category->name, 'diupdate']);
    
        return redirect()->route('category.index');
    }
}