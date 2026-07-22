<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil hanya 9 produk terbaru untuk homepage
        $products = Product::with('category')
            ->latest()
            ->take(9)
            ->get();

        $featuredProducts = Product::where('is_featured', true)
            ->latest()
            ->take(4)
            ->get();

        // Ambil semua kategori
        $categories = Category::withCount('products')->get();

        // Statistik
        $totalProducts = Product::count();
        $totalCategories = Category::count();

        return view('home.index', compact(
            'products',
            'categories',
            'totalProducts',
            'totalCategories',
            'featuredProducts'
        ));
    }
}