<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class RegistrationWizard extends Component
{

    public string $email = '';
    public string $name = '';
    public string $password = '';

    public int $currentStep = 1;

    private static function myGetRules(): array
    {
        $myrules1 = [
            'name'  => ['required'],
            'email' => ['required', 'email'],
        ];
        $myrules2 = [
            'password' => ['required', 'min:6'],
        ];

        $allRules = [
            1 => $myrules1,
            2 => $myrules2,
        ];
        return $allRules;
    }

    public function render()
    {
        return view('livewire.registration-wizard');
    }


    public function progressWizard(int $toWhere, $validation = true){

        $allRules = self::myGetRules();


        if($validation){
            $this->validate($allRules[$this->currentStep]);
        }

        $this->currentStep = $toWhere;
    }

    public function actuallyDoSubmit(){

        $allRules = self::myGetRules();
        $flatRules = collect($allRules)->mapWithKeys(
            function ($item, $key) {
                return $item;
            });
        $this->validate($flatRules->toArray());
        $u = new User();
        $u->name = $this->name;
        $u->email = $this->email;
        $u->password = Hash::make($this->password);
        $u->save();
        return redirect('/');
    }
}
