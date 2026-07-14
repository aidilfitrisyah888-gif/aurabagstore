<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class AboutController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();

        return view('about.index', compact(
            'totalProducts',
            'totalCategories'
        ));
    }
}