<?php

namespace App\Http\Livewire\Subcategory;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class Create extends Component
{
    public $category_id, $name;
    
    protected $rules = [
        'category_id' => 'required',
        'name' => 'required',
    ];

    public function messages()
    {
        return [
            'category_id.required' => 'Kategori tidak boleh kosong',
            'name.required' => 'Nama tidak boleh kosong'
        ];
    }
    
    public function render()
    {
        $categories = Category::select('id', 'name')->get();

        return view('livewire.subcategory.create', [
            'categories' => $categories
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Sub Kategori',
                    'route' => 'subcategory.index'
                ],
                [
                    'name' => 'Tambah Sub Kategori'
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

        $subcategory = Subcategory::create([
            'category_id' => $this->category_id,
            'name' => $this->name
        ]);
        
        session()->flash('message', [$subcategory->name, 'ditambahkan']);
    
        return redirect()->route('subcategory.index');
    }
}