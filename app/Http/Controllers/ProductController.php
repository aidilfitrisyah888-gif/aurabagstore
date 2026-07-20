<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::with([
            'category',
            'images' => function ($query) {
                $query->orderBy('sort_order');
            }
        ])
        ->where('slug', $slug)
        ->firstOrFail();

        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(3)
            ->get();

        return view(
            'products.show',
            compact('product', 'relatedProducts')
        );
    }

    public function index(Request $request)
    {
        $query = Product::with('category');

        // Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter Kategori
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Sorting
        switch ($request->sort) {

            case 'low':
                $query->orderBy('price');
                break;

            case 'high':
                $query->orderByDesc('price');
                break;

            case 'name':
                $query->orderBy('name');
                break;

            default:
                $query->latest();
                break;
        }

        $products = $query
            ->paginate(9)
            ->withQueryString();

        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }
}