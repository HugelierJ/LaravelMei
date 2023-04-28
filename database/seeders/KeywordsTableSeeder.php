<?php

namespace Database\Seeders;

use App\Models\Keyword;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeywordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keywords = [
            "Classic Shoes Men",
            "Men's Oxfords",
            "Leather Shoes",
            "Classic Shoes Women",
            "Women's Heels",
            "Women's Dress Shoes",
        ];
        foreach ($keywords as $keyword) {
            Keyword::create([
                "name" => $keyword,
            ]);
        }
    }
}
