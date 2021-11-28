<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class UserSelector extends Component
{

    public Collection $users;

    /** @var int */
    public $selectedUser;

    public function render()
    {
        return view('livewire.user-selector');
    }

    public function mount(){
        $this->users = User::all();
    }

    public function doTheSelectThing(int $userId){
        $this->selectedUser = $userId;
    }

}
