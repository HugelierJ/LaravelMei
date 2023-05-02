<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productcategories = [
            "Classic Shoes",
            "Men's Dress Shoes",
            "Men's Oxfords",
            "Women's Dress Shoes",
            "Women's Heels",
            "Women's Pumps",
        ];
        foreach ($productcategories as $productcategory) {
            ProductCategory::create([
                "name" => $productcategory,
                "description" => Str::words(20),
            ]);
        }
    }
}
