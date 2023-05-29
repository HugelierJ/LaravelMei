<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Shoppingcart extends Component
{
    //    protected $listeners = ["updateQuantity" => "updateNow"];

    public $seeCartItems;
    public $cartitem;
    public $quantity;
    public $total = 0;

    public function render()
    {
        return view("livewire.shoppingcart");
    }
    //    public function updateNow()
    //    {
    //        $this->cartitem->save();
    //    }

    public function calculate($price)
    {
        if ($this->quantity <= 0) {
            $this->quantity = 1;
        } elseif ($this->quantity > $this->cartitem->product->stock) {
            $this->quantity = $this->cartitem->product->stock;
        }
        $this->total = $this->quantity * $price;
        $this->cartitem->quantity = $this->quantity;
        $this->cartitem->save();
    }
}
