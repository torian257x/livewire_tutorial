<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FirstComponent extends Component
{

    /** @var int */
    public $amount = 0;

    public function render()
    {
        return view('livewire.first-component');
    }
}
