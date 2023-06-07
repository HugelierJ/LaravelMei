<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Product_ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = Product::pluck("id")->all();
        $productCategories = ProductCategory::pluck("id")->all();

        foreach ($products as $productId) {
            $productCategoryId =
                $productCategories[array_rand($productCategories)];

            DB::table("product_productcategory")->insert([
                "product_id" => $productId,
                "productcategory_id" => $productCategoryId,
                "created_at" => now(),
                "updated_at" => now(),
            ]);
        }
    }
}
