<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public $name = '';

    public function mount()
    {
        $this->name = 'kiyomi';
    }

    public function updated(){

        $this->name = 'kumiko';

    }

    public function mouseOver()
    {
        $this->name = 'rie';
    }

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
