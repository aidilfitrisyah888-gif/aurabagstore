<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->get();

        $products = Product::with('category')

            ->when($request->search, function ($query) use ($request) {

                $query->where('name', 'like', '%' . $request->search . '%');

            })

            ->when($request->category, function ($query) use ($request) {

                $query->where('category_id', $request->category);

            })

            ->when($request->sort, function ($query) use ($request) {

                switch ($request->sort) {

                    case 'oldest':
                        $query->oldest();
                        break;

                    case 'price_low':
                        $query->orderBy('price');
                        break;

                    case 'price_high':
                        $query->orderByDesc('price');
                        break;

                    case 'name':
                        $query->orderBy('name');
                        break;

                    default:
                        $query->latest();

                }

            }, function ($query) {

                $query->latest();

            })

            ->latest()

            ->paginate(10)

            ->withQueryString();

        return view('admin.products.index', compact(
            'products',
            'categories'
        ));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'required',
        'shopee_link' => 'required|url',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);
    
    $image = $request->file('image')->store('products', 'public');

    Product::create([
        'name' => $request->name,
        'slug' => Str::slug($request->name),
        'category_id' => $request->category_id,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
        'image' => $image,
        'shopee_link' => $request->shopee_link,
    ]);

    return redirect()
        ->route('admin.products.index')
        ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view(
            'admin.products.edit',
            compact('product', 'categories')
        );
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'required',
            'shopee_link' => 'required|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $image = $product->image;

        if ($request->hasFile('image')) {

            Storage::disk('public')->delete($product->image);

            $image = $request->file('image')->store('products', 'public');
        }

        $product->update([

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'category_id' => $request->category_id,

            'price' => $request->price,

            'stock' => $request->stock,

            'description' => $request->description,

            'image' => $image,

            'shopee_link' => $request->shopee_link,

        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->image);

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}