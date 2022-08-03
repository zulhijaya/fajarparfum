<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
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
            'name.required' => 'Nama kategori tidak boleh kosong'
        ];
    }
    
    public function render()
    {
        return view('livewire.category.create')->layoutData([
            'titles' => [
                [
                    'name' => 'Kategori',
                    'route' => 'category.index'
                ],
                [
                    'name' => 'Tambah Kategori'
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

        $category = Category::create([
            'name' => $this->name,
        ]);
        
        session()->flash('message', [$category->name, 'ditambahkan']);
    
        return redirect()->route('category.index');
    }
}