<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ShopProducts extends Component
{
    protected $products;

    public function render()
    {
        $this->products = Product::all();
        return view("livewire.shop-products", ["products" => $this->products]);
    }
}
