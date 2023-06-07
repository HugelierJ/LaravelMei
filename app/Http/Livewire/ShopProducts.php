<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ShopProducts extends Component
{
    //FILTER MOET IN PARENT COMPONENT GEBEUREN EN DE PRODUCT DIE WORDT DOORGEGEVEN MOET AANGEPAST WORDEN MET EEN QUERY

    public $product;

    public function render()
    {
        return view("livewire.shop-products");
    }
}
