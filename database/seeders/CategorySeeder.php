<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            [
                'name' => 'Ransel',
                'slug' => 'ransel',
            ],
            [
                'name' => 'Tote Bag',
                'slug' => 'tote-bag',
            ],
            [
                'name' => 'Sling Bag',
                'slug' => 'sling-bag',
            ],
            [
                'name' => 'Travel Bag',
                'slug' => 'travel-bag',
            ],
        ]);
    }
}