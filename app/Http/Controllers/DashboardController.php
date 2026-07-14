<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $totalCategories = Category::count();

        $totalUsers = User::count();

        $totalStock = Product::sum('stock');

        $latestProducts = Product::with('category')
            ->latest()
            ->take(5)
            ->get();

        $latestCategories = Category::latest()
            ->take(5)
            ->get();

        $outOfStock = Product::where('stock', 0)->count();

        $lowStock = Product::whereBetween('stock', [1,5])->count();

        $availableStock = Product::where('stock','>',5)->count();

        return view('dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalUsers',
            'totalStock',
            'latestProducts',
            'latestCategories',
            'outOfStock',
            'lowStock',
            'availableStock'
        ));
    }
}