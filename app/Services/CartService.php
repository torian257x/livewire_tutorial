<?php


namespace App\Services;


class CartService
{

    const CART_ITEMS_SESSION_KEY = 'cart_items';

    public static function addProduct(int $productId)
    {
        $items = session()->get(self::CART_ITEMS_SESSION_KEY, []);

        if($items){
            $items[] = $productId;
        }else{
            $items = [];
            $items[] = $productId;
        }
        session()->put(self::CART_ITEMS_SESSION_KEY, $items);
    }

    public static function removeProductsWithId(int $removeProductId){
        $products = self::getProducts();
        $filteredProducts = collect($products)->filter(function($productId, $key) use ($removeProductId){
            if((int)$productId === (int)$removeProductId){
                return false;
            }else{
                return true;
            }
        })->toArray();

        session()->put(self::CART_ITEMS_SESSION_KEY, $filteredProducts);
    }

    public static function getProducts(): ?array
    {
        return session()->get(self::CART_ITEMS_SESSION_KEY, []);
    }

    public static function getProductCount(){
        $count = sizeof(self::getProducts() ?: []);
        return $count;

    }

}
