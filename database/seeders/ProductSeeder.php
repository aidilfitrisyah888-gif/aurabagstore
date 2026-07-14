<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'category_id' => 1,
            'name' => 'Tas Ransel Eiger',
            'slug' => 'tas-ransel-eiger',
            'price' => 250000,
            'stock' => 15,
            'description' => 'Tas ransel berkualitas untuk aktivitas sehari-hari.',
            'image' => 'ransel.jpg',
            'shopee_link' => 'https://shopee.co.id/',
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Tas Tote Kanvas',
            'slug' => 'tas-tote-kanvas',
            'price' => 120000,
            'stock' => 20,
            'description' => 'Tas tote berbahan kanvas yang stylish.',
            'image' => 'totebag.jpg',
            'shopee_link' => 'https://shopee.co.id/',
        ]);
    }
}