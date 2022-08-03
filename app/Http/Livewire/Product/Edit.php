<?php

namespace App\Http\Livewire\Product;

use App\Models\Tag;
use App\Models\Merk;
use App\Models\Product;
use Livewire\Component;
use App\Models\Subcategory;

class Edit extends Component
{
    public Product $product;
    public $tag_ids = [];

    protected $rules = [
        'product.subcategory_id' => 'required',
        'product.name' => 'required',
        'product.other_name' => 'nullable',
        'product.price' => 'nullable',
        'product.tags.*.id' => 'nullable'
    ];

    public function mount()
    {   
        $this->product->load(['subcategory' => function ($query) {
            $query->select('id', 'category_id');
        }]);
        $this->tag_ids = $this->product->tags->pluck('id')->toArray();
    }

    public function messages()
    {
        return [
            'product.category_id.required' => 'Jenis parfum tidak boleh kosong',
            'product.name.required' => 'Nama tidak boleh kosong'
        ];
    }

    public function render()
    {
        $subcategories = Subcategory::where('name', '!=', 'botol')->get();
        $merks = Merk::get();
        $tags = Tag::orderBy('name')->get();
        
        return view('livewire.product.edit', [
            'subcategories' => $subcategories,
            'merks' => $merks,
            'tags' => $tags
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Produk',
                    'route' => 'product.index'
                ],
                [
                    'name' => $this->product->name,
                    'route' => 'product.index'
                ],
                [
                    'name' => 'Edit Produk'
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

        $this->product->update([
            'name' => $this->product->name,
            'other_name' => $this->product->other_name,
            'price' => $this->product->price
        ]);
        
        $this->product->tags()->sync($this->tag_ids);
        
        session()->flash('message', [$this->product->name, 'diupdate']);
    
        return redirect()->route('product.index');
    }
}