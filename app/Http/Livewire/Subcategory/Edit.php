<?php

namespace App\Http\Livewire\Subcategory;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class Edit extends Component
{
    public Subcategory $subcategory;
    
    protected $rules = [
        'subcategory.category_id' => 'required',
        'subcategory.name' => 'required'
    ];

    public function messages()
    {
        return [
            'name.required' => 'Nama kategori tidak boleh kosong'
        ];
    }

    public function render()
    {
        $categories = Category::select('id', 'name')->get();

        return view('livewire.subcategory.edit', [
            'categories' => $categories
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Sub Kategori',
                    'route' => 'subcategory.index'
                ],
                [
                    'name' => 'Edit Sub Kategori'
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

        $this->subcategory->update([
            'category_id' => $this->subcategory->category_id,
            'name' => $this->subcategory->name
        ]);
        
        session()->flash('message', [$this->subcategory->name, 'diupdate']);
    
        return redirect()->route('subcategory.index');
    }
}