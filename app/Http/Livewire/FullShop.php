<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Gender;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class FullShop extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $brands;
    public $genders;
    public $products;
    public $productSearch;
    public $genderValue;
    public $brandValue;
    public $minPrice = 0;
    public $priceValue;

    public function render()
    {
        $query = Product::with(["photo", "brand"])->where(
            "name",
            "like",
            "%" . $this->productSearch . "%"
        );
        if ($this->genderValue) {
            $query->where("gender_id", $this->genderValue);
        }
        if ($this->brandValue) {
            $query->where("brand_id", $this->brandValue);
        }
        if ($this->priceValue) {
            $query->where(
                "price" .
                    " BETWEEN " .
                    $this->minPrice .
                    " AND " .
                    $this->priceValue
            );
        }

        $this->genders = Gender::all();
        $this->brands = Brand::all();
        $this->products = $query->get();
        return view("livewire.full-shop", [
            "brands" => $this->brands,
            "products" => $this->products,
        ]);
    }
}
