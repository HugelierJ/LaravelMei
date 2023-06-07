<?php

namespace Database\Seeders;

use App\Models\Gender;
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

        $genders = ["X", "Male", "Male", "Female", "Female", "Female"];

        foreach ($productcategories as $index => $productcategory) {
            $gender = isset($genders[$index]) ? $genders[$index] : "X";
            $genderId = Gender::where("name", $gender)->value("id");

            ProductCategory::create([
                "name" => $productcategory,
                "description" => fake()->paragraph(2),
                "gender_id" => $genderId,
            ]);
        }
    }
}
