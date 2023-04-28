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
        $productcategories = ["Classic", "Low ankle", "High ankle"];
        foreach ($productcategories as $productcategory) {
            ProductCategory::create([
                "name" => $productcategory,
                "description" => Str::words(20),
            ]);
        }
    }
}
