<?php

namespace App\Http\Livewire\Tag;

use App\Models\Tag;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $tags = Tag::withCount('products')->orderBy('name')->get();

        return view('livewire.tag.index', [
            'tags' => $tags
        ])->layoutData([
            'titles' => [
                [
                    'name' => 'Penanda'
                ]
            ],
            'create' => [
                'route' => 'tag.create', 
                'parameter' => ''
            ]
        ]);
    }

    public function delete(Tag $tag)
    {
        $name = $tag->name;
        $tag->delete();
        
        session()->flash('message', [$name, 'dihapus']);
    
        return redirect()->route('tag.index');
    }
}