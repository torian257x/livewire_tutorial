<?php
/** @see App\Http\Livewire\UserSelector */
?>
<div>

    <div style="max-width: 150px;">

        @foreach($users as $user)
            <div wire:click="doTheSelectThing({{ $user->id }})"
                 style="background-color: {{ $user->id === $selectedUser ? 'salmon' : 'gray' }};
                 margin-top: 10px; cursor: pointer;">
                {{ $user->name }}</div>
        @endforeach
    </div>

</div>
