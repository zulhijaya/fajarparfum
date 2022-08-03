<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $categories = Category::withCount('products')->get();

        return view('livewire.category.index', [
            'categories' => $categories
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Kategori'
                ]
            ],
            'create' => [
                'route' => 'category.create',
                'parameter' => ''
            ]
        ]);
    }

    public function delete(Category $category)
    {
        $name = $category->name;
        $category->delete();
        
        session()->flash('message', [$name, 'dihapus']);
    
        return redirect()->route('category.index');
    }
}