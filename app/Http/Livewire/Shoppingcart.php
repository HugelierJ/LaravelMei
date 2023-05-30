<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Shoppingcart extends Component
{
    protected $listeners = ["updateCartTotal" => "updateTotal"];
    public $cartitems;
    public $cartTotal;
    public $total;

    public function render()
    {
        $this->cartitems = Cart::content();
        $this->total = Cart::subtotal();

        return view("livewire.shoppingcart", [
            "cartitems" => $this->cartitems,
            "total" => $this->total,
        ]);
    }
    public function updateTotal()
    {
        $this->cartTotal = Cart::count();
    }
}
