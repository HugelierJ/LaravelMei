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

    public $brands;
    public $genders;
    public $products;
    public $productSearch;
    public $genderValue;
    public $brandValue;
    public $sortBy = "";
    public $sortDirection = "asc";

    public $minPrice = 0;
    public $priceValue;
    public $priceMax;
    public $newValue;
    protected $paginationTheme = "bootstrap";

    protected $queryString = ["genderValue"];

    public function tryChange()
    {
        $this->newValue = $this->priceValue;
    }

    public function mount()
    {
        $expensiveProduct = Product::orderBy("price", "desc")->first();
        $this->priceMax = $expensiveProduct->price;
    }

    public function changeSortDirection()
    {
        $this->sortDirection = $this->sortDirection === "asc" ? "desc" : "asc";
    }

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
            $query->whereBetween("price", [$this->minPrice, $this->priceValue]);
        }
        if ($this->sortBy) {
            $query->orderBy($this->sortBy, $this->sortDirection);
        }

        $this->genders = Gender::all();
        $this->brands = Brand::all();
        $this->products = $query->get();
        return view("livewire.full-shop");
    }
}
