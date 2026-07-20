<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.categories.index', compact(
            'categories',
            'search'
        ));
    }
    
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:100|unique:categories,name',
                'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ],
            [
                'name.required' => 'Nama kategori wajib diisi.',
                'name.max' => 'Nama kategori maksimal :max karakter.',
                'name.unique' => 'Nama kategori sudah digunakan.',
                'icon.image' => 'Ikon harus berupa gambar.',
                'icon.mimes' => 'Ikon harus berformat JPG, JPEG, PNG, atau WEBP.',
                'icon.max' => 'Ukuran ikon maksimal 2 MB.',
            ]
        );

        $icon = null;

        if ($request->hasFile('icon')) {

            $icon = $request->file('icon')->store('categories', 'public');

        }

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'icon' => $icon,
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(
            [
                'name' => 'required|max:100|unique:categories,name,' . $category->id,
                'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ],
            [
                'name.required' => 'Nama kategori wajib diisi.',
                'name.max' => 'Nama kategori maksimal :max karakter.',
                'name.unique' => 'Nama kategori sudah digunakan.',
                'icon.image' => 'Ikon harus berupa gambar.',
                'icon.mimes' => 'Ikon harus berformat JPG, JPEG, PNG, atau WEBP.',
                'icon.max' => 'Ukuran ikon maksimal 2 MB.',
            ]
        );

        $icon = $category->icon;

        if ($request->hasFile('icon')) {

            if ($category->icon) {

                Storage::disk('public')->delete($category->icon);

            }

            $icon = $request->file('icon')->store('categories', 'public');
        }

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'icon' => $icon,
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diubah');
    }

    public function destroy(Category $category)
    {
        if ($category->icon) {

            Storage::disk('public')->delete($category->icon);

        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}