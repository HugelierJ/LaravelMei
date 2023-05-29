<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartTotal extends Component
{
    public $total;
    public $cartitems;

    public function mount()
    {
        if (Auth()->user()) {
            $this->cartitems = Auth()->user()->cart->cartItems;
        }
        foreach ($this->cartitems as $cartItem) {
            $this->total += $cartItem->price;
        }
    }
    //    public function saveQuantity()
    //    {
    //        $this->emit("updateQuantity");
    //    }
    public function render()
    {
        return view("livewire.cart-total");
    }
}
