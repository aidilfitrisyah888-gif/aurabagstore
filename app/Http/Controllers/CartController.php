<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Menampilkan keranjang
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart.index', compact('cart'));
    }


    /**
     * Menambahkan produk ke keranjang
     */
    public function add(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {

            return redirect()
                ->back()
                ->with('success', 'Produk sudah ada di keranjang.');

        }

        $cart[$product->id] = [

            'id' => $product->id,

            'name' => $product->name,

            'price' => $product->price,

            'image' => $product->image,

            'shopee_link' => $product->shopee_link,

        ];

        session()->put('cart', $cart);

        return redirect()
            ->back()
            ->with('success', 'Produk berhasil disimpan ke keranjang!');
    }


    /**
     * Menghapus produk dari keranjang
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            unset($cart[$id]);

            session()->put('cart', $cart);

        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Produk berhasil dihapus dari keranjang.');
    }


    /**
     * Mengubah jumlah produk
     */
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Produk tidak ditemukan di keranjang.');
        }

        $quantity = (int) $request->input('quantity');

        if ($quantity < 1) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Jumlah produk minimal 1.');
        }

        $product = Product::find($id);

        if (!$product) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Produk tidak ditemukan.');
        }

        if ($quantity > $product->stock) {
            return redirect()
                ->route('cart.index')
                ->with(
                    'error',
                    'Jumlah melebihi stok yang tersedia. Stok saat ini: ' . $product->stock
                );
        }

        $cart[$id]['quantity'] = $quantity;

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Jumlah produk berhasil diperbarui.');
    }


    /**
     * Mengosongkan keranjang
     */
    public function clear()
    {
        session()->forget('cart');

        return redirect()
            ->route('cart.index')
            ->with('success', 'Keranjang berhasil dikosongkan.');
    }
}