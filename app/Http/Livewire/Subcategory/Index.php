<?php

namespace App\Http\Livewire\Subcategory;

use Livewire\Component;
use App\Models\Subcategory;

class Index extends Component
{
    public function render()
    {
        $subcategories = Subcategory::with('category')->withCount('products')->get()->groupBy('category.name');

        return view('livewire.subcategory.index', [
            'subcategories' => $subcategories
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Sub Kategori'
                ]
            ],
            'create' => [
                'route' => 'subcategory.create',
                'parameter' => ''
            ]
        ]);
    }

    public function delete(Subcategory $subcategory)
    {
        $name = $subcategory->name;
        $subcategory->delete();
        
        session()->flash('message', [$name, 'dihapus']);
    
        return redirect()->route('subcategory.index');
    }
}