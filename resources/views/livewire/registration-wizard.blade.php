<?php
    /** @see App\Http\Livewire\RegistrationWizard */
?><div>
    <style type="text/css">
        .myerror{
            color: red;
            font-size: 10px;
        }
    </style>

    <div style="{{ $currentStep === 1 ? 'display: flex; flex-direction: column;' : 'display: none;' }}">
        <h1>Step 1</h1>
        <label>Name <input type="text" wire:model="name"/>
        @error('name') <div class="myerror">{{ $message }}</div> @enderror
        </label>
        <label>Email <input type="text" wire:model="email"/>
        @error('email') <div class="myerror">{{ $message }}</div> @enderror
        </label>
        <button style="max-width: 100px" wire:click="progressWizard(2)">Next</button>
    </div>
    <div style="{{ $currentStep === 2 ? 'display: flex; flex-direction: column;' : 'display: none;' }}">
        <h1>Step 2</h1>
        <label>
            Password
            <input type="password" wire:model="password"/>
            @error('password') <div class="myerror">{{ $message }}</div> @enderror
        </label>

        <button style="max-width: 150px" wire:click="actuallyDoSubmit()">Submit Me</button>
    </div>


    <br>
    <br>
    <br>
    <br>
    <button wire:click="progressWizard(1, false)">Go to step 1</button>
    <button wire:click="progressWizard(2, false)">Go to step 2</button>
</div>
