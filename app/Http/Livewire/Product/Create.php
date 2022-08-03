<?php

namespace App\Http\Livewire\Product;

use App\Models\Tag;
use App\Models\Product;
use Livewire\Component;
use App\Models\Subcategory;
use Illuminate\Validation\Rule;

class Create extends Component
{
    public $subcategories = [];
    public $subcategory_id, $name, $other_name, $price, $tag_ids = [];

    protected $rules = [
        'subcategory_id' => 'required',
        'name' => 'required'
    ];

    public function messages()
    {
        return [
            'subcategory_id.required_if' => 'Jenis parfum tidak boleh kosong',
            'name.required' => 'Nama tidak boleh kosong',
            'price.required' => 'Harga tidak boleh kosong',
        ];
    }

    public function render()
    {
        $this->subcategories = Subcategory::get();
        $tags = Tag::get();
        
        return view('livewire.product.create', [
            'tags' => $tags
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Produk',
                    'route' => 'product.index'
                ],
                [
                    'name' => 'Tambah Produk'
                ]
            ],
            'create' => [
                'route' => ''
            ]
        ]);
    }

    public function getCategoryIdProperty()
    {
        return $this->subcategory_id ? $this->subcategories->firstWhere('id', $this->subcategory_id)->category_id : '';
    }

    public function store() 
    {
        $this->validate();
        $this->validate([
            'price' => Rule::requiredIf($this->subcategory_id != 1)
        ]);

        $product = Product::create([
            'subcategory_id' => $this->subcategory_id,
            'name' => $this->name,
            'other_name' => $this->other_name,
            'price' => $this->subcategory_id == 1 ? NULL : $this->price
        ]);
        
        $product->tags()->attach($this->tag_ids);

        session()->flash('message', [$product->name, 'ditambahkan']);
    
        return redirect()->route('product.index');
    }
}
