<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
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

            'motif' => 'required|max:255',

            'bahan' => 'required|max:255',

            'ukuran' => 'required|max:255',

            'short_description' => 'required',

            'long_description' => 'required',

            'shopee_link' => 'required|url',

            'images' => 'required|array|min:1',

            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Simpan Produk
        |--------------------------------------------------------------------------
        */

        $product = Product::create([

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'category_id' => $request->category_id,

            'price' => $request->price,

            'stock' => $request->stock,

            'motif' => $request->motif,

            'bahan' => $request->bahan,

            'ukuran' => $request->ukuran,

            'short_description' => $request->short_description,

            'long_description' => $request->long_description,

            'description' => $request->long_description,

            'shopee_link' => $request->shopee_link,

            'image' => 'temporary',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Simpan Banyak Gambar
        |--------------------------------------------------------------------------
        */

        foreach ($request->file('images') as $index => $image) {

            $imagePath = $image->store('products', 'public');

            if ($index === 0) {

                $product->update([
                    'image' => $imagePath
                ]);

            }

            ProductImage::create([

                'product_id' => $product->id,

                'image' => $imagePath,

                'sort_order' => $index,

            ]);

        }

        return redirect()

            ->route('admin.products.index')

            ->with('success', 'Produk berhasil ditambahkan.');

    }


    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        $product->load('images');

        return view(

            'admin.products.edit',

            compact('product', 'categories')

        );

    }

    public function show(Product $product)
    {
        $product->load([
            'category',
            'images' => function ($query) {
                $query->orderBy('sort_order');
            }
        ]);

        return view(
            'admin.products.show',
            compact('product')
        );
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([

            'name' => 'required|max:255',

            'category_id' => 'required|exists:categories,id',

            'price' => 'required|numeric',

            'stock' => 'required|integer',

            'motif' => 'required|max:255',

            'bahan' => 'required|max:255',

            'ukuran' => 'required|max:255',

            'short_description' => 'required',

            'long_description' => 'required',

            'shopee_link' => 'required|url',

            'images' => 'nullable|array',

            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE DATA PRODUK
        |--------------------------------------------------------------------------
        */

        $product->update([

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'category_id' => $request->category_id,

            'price' => $request->price,

            'stock' => $request->stock,

            'motif' => $request->motif,

            'bahan' => $request->bahan,

            'ukuran' => $request->ukuran,

            'short_description' => $request->short_description,

            'long_description' => $request->long_description,

            'description' => $request->long_description,

            'shopee_link' => $request->shopee_link,

        ]);


        /*
        |--------------------------------------------------------------------------
        | TAMBAH GAMBAR BARU
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('images')) {

            $lastSortOrder =
                $product->images()->max('sort_order') ?? -1;

            /*
            |----------------------------------------------------------------------
            | Cek apakah produk belum memiliki gambar utama
            |----------------------------------------------------------------------
            */

            $hasPrimaryImage =
                $product->image &&
                $product->image !== 'temporary';

            foreach ($request->file('images') as $index => $image) {

                $imagePath =
                    $image->store('products', 'public');

                /*
                |------------------------------------------------------------------
                | Jika belum ada gambar utama
                |------------------------------------------------------------------
                */

                if (!$hasPrimaryImage && $index === 0) {

                    $sortOrder = 0;

                    $product->update([
                        'image' => $imagePath,
                    ]);

                    $hasPrimaryImage = true;

                } else {

                    $sortOrder =
                        $lastSortOrder + $index + 1;

                }

                ProductImage::create([

                    'product_id' => $product->id,

                    'image' => $imagePath,

                    'sort_order' => $sortOrder,

                ]);

            }

        }

        return redirect()

            ->route('admin.products.index')

            ->with(
                'success',
                'Produk berhasil diperbarui.'
            );
    }

    public function destroyImage(ProductImage $image)
    {
        $product = $image->product;

        $wasPrimary = $product->image === $image->image;

        Storage::disk('public')->delete($image->image);

        $image->delete();


        if ($wasPrimary) {

            $newPrimary = $product->images()
                ->orderBy('sort_order')
                ->first();


            if ($newPrimary) {

                $newPrimary->update([
                    'sort_order' => 0,
                ]);

                $product->update([
                    'image' => $newPrimary->image,
                ]);

            } else {

                $product->update([
                    'image' => 'temporary',
                ]);

            }

        }


        return back()->with(

            'success',

            'Gambar berhasil dihapus.'

        );

    }

    public function setPrimaryImage(ProductImage $image)
    {
        $product = $image->product;

        $currentPrimary = $product->images()
            ->where('sort_order', 0)
            ->first();

        if ($currentPrimary && $currentPrimary->id === $image->id) {
            return back()->with(
                'info',
                'Gambar tersebut sudah menjadi gambar utama.'
            );
        }

        if ($currentPrimary) {
            $currentPrimary->update([
                'sort_order' => $image->sort_order
            ]);
        }

        $image->update([
            'sort_order' => 0
        ]);

        $product->update([
            'image' => $image->image
        ]);

        return back()->with(
            'success',
            'Gambar utama berhasil diubah.'
        );
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