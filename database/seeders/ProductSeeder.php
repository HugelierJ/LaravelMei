<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $brands = Brand::all();
        $photos = Photo::all();
        $colors = Color::all();
        for ($i = 0; $i < 50; $i++) {
            $product = new Product();
            $product->name = fake()->words(2, true);
            $product->body = fake()->paragraphs(3, true);
            $product->photo_id = $photos->random()->id;
            $product->brand_id = $brands->random()->id;
            $product->color_id = $colors->random()->id;
            $product->price = fake()->randomFloat(3, 2, true);
            $product->stock = fake()->numberBetween(1, 150);
            $product->save();
        }
    }
}
