<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            '1. 商品のお届けについて',
            '2. 商品の交換について',
            '3. 商品トラブル',
            '4. ショップへのお問合せ',
            '5. その他'
        ];

        foreach ($categories as $text) {
            Category::create([
                'content' => $text,
            ]);
        }
    }
}
