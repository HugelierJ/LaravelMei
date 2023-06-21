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
        $path = storage_path("app/public/posts");
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        } else {
            $files = glob($path . "/*");
            if (count($files) > 9) {
                Storage::disk("public")->deleteDirectory("posts");
            }
        }
        return [
            "file" => function () {
                $imageUrl =
                    "https://images.unsplash.com/photo-1609259886986-a642e7e1dbf9?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=480&ixid=MnwxfDB8MXxyYW5kb218MHx8Zm9ybWFsc2hvZXN8fHx8fHwxNjg3MzU3MzA0&ixlib=rb-4.0.3&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=640";
                $imageData = file_get_contents($imageUrl);
                $filename = "posts/" . uniqid() . ".jpg";
                Storage::disk("public")->put($filename, $imageData);
                return $filename;
            },
        ];
    }
}
//fake()->imageUrl($width=400, $height=400);
