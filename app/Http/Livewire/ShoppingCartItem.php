<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShoppingCartItem extends Component
{
    public $rowId;
    protected $item;
    public $quantity;
    public $price;

    public function updatePrice()
    {
        $this->item = Cart::get($this->rowId);
        $productStock = Product::findOrFail($this->item->id)->stock;
        if ($this->quantity <= 0) {
            $this->quantity = 1;
        } elseif ($this->quantity > $productStock) {
            $this->quantity = $productStock;
        }
        $this->quantity = floor($this->quantity);
        $this->item->qty = $this->quantity;
        $this->price = $this->item->price * $this->quantity;
        $this->emit("updateCartTotal");
    }

    public function mount()
    {
        $this->item = Cart::get($this->rowId);
        $this->price = $this->item->price * $this->item->qty;
        $this->price = number_format($this->price, 2, ",", ".");
        $this->quantity = $this->item->qty;
    }

    public function render()
    {
        return view("livewire.shopping-cart-item", ["item" => $this->item]);
    }
}
