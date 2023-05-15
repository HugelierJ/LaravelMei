<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Shoppingcart extends Component
{
    public $cartitem;
    public $quantity;
    public $total;

    public function render()
    {
        return view("livewire.shoppingcart");
    }

    public function calculate($price)
    {
        if ($this->quantity <= 0) {
            $this->quantity = 1;
        }
        $this->total = $this->quantity * $price;
    }
}
