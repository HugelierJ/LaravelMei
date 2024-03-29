<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $path = storage_path("app/public/products");
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        } else {
            $files = glob($path . "/*");
            if (count($files) > 9) {
                Storage::disk("public")->deleteDirectory("products");
            }
        }
        return [
            "file" => function () {
                $imageUrl = "https://www.picsum.photos/640/480";
                $imageData = file_get_contents($imageUrl);
                $filename = "products/" . uniqid() . ".jpg";
                Storage::disk("public")->put($filename, $imageData);
                return $filename;
            },
        ];
    }
}
//fake()->imageUrl($width=400, $height=400);
