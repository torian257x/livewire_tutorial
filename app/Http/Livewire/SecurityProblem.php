<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SecurityProblem extends Component
{

    public $userId = 1;

    //Livewire.all()[0].userId = 2

    public function render()
    {
        $user = User::find($this->userId);
        return view('livewire.security-problem', ['user' => $user]);
    }

    public function updatingUserId($newValue){
        if($this->userId !== $newValue){
            throw new \Exception('bad BOI!!');
        }
    }

}
