<?php

namespace App\Http\Livewire\Shop\Cart;

use Livewire\Component;
use Cart;

class IndexComponent extends Component
{
    public function render()
    {
        $cart_items = Cart::session(auth()->id())->getContent();

        return view('livewire.shop.cart.index-component',
                    compact('cart_items'))
                    ->extends('layouts.app')
                    ->section('content');
    }

    public function update_quantity($itemId, $quantity)
    {
        # code...
        // add cart items to a specific user
        $userId = auth()->id(); // or any string represents user identifier

        Cart::session($userId)
        ->update($itemId,
        [
            'quantity' => array(
                'relative' => false,
                'value' => $quantity
            ),
        ]);
    }

    public function delete_item($itemId)
    {
        # code...
        Cart::session(auth()->id())
            ->remove($itemId);
    }
}
