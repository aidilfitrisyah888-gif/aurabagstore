<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil hanya 6 produk terbaru untuk homepage
        $products = Product::with('category')
            ->latest()
            ->take(6)
            ->get();

        // Ambil semua kategori
        $categories = Category::all();

        // Statistik
        $totalProducts = Product::count();
        $totalCategories = Category::count();

        return view('home.index', compact(
            'products',
            'categories',
            'totalProducts',
            'totalCategories'
        ));
    }
}