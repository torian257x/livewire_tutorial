<?php
  /** @see App\Http\Livewire\ProductSelector */
?><div class="ms-n3 mt-n3 d-flex flex-wrap">
    @foreach([1,2,3,4] as $currentId)
        <div class="card ms-3 mt-3" style="width: 18rem;">
            <img src="https://picsum.photos/id/{{ $currentId * 10 }}/300/100" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <button wire:click="addProductToCart({{ $currentId }})" class="btn btn-primary">Add to cart</button>
                <button wire:click="removeProductFromCart({{ $currentId }})" class="btn btn-danger">Remove all</button>
            </div>
        </div>
    @endforeach
</div>
