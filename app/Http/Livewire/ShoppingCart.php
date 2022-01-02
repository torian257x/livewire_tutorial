<?php

namespace App\Http\Livewire;

use App\Services\CartService;
use Livewire\Component;

class ShoppingCart extends Component
{

    public $count = 0;

    protected $listeners = [
        'shoppingCartUpdate'=> 'eventCartUpdated',
        'removeAllOfTheseProductsWithId' => 'eventProductsNeedDelete',
    ];

    public function render()
    {
        return view('livewire.shopping-cart');
    }

    public function mount()
    {
        $this->count = CartService::getProductCount();
    }


    public function eventCartUpdated()
    {
        $this->count = CartService::getProductCount();
    }

    public function eventProductsNeedDelete($params){
        $productId = $params['productId'];
        CartService::removeProductsWithId($productId);
        $this->count = CartService::getProductCount();
    }
}
