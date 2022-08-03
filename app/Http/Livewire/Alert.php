<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public $open = false;
    protected $listeners = ['showAlert' => 'handleAlert'];

    public function mount()
    {
        // if( $this->open ) $this->handleAlert();
        // dd($this->open);
    }

    public function render()
    {
        return view('livewire.alert');
    }

    public function handleAlert()
    {
        // $this->dispatchBrowserEvent('close-alert');
        dd("ok");
    }
}
