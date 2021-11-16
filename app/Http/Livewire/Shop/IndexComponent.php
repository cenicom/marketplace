<?php

namespace App\Http\Livewire\Shop;

use Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IndexComponent extends Component
{
    public function render()
    {
        $products = Product::take(21)->get();

        return view('livewire.shop.index-component', compact(
            'products'
        ))
        ->extends('layouts.app')
        ->section('content');
    }

    public function add_to_cart(Product $product)
    {
        # code...
        // add the product to cart
        Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        $this->emit('message', 'Producto Agregado Correctamente al Carrito...');

        $this->emitTo('shop.cart-component', 'add_to_cart');
    }
}
