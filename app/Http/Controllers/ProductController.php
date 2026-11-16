<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $validated = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'kategori' => ['nullable', 'string', 'max:80'],
        ]);

        $search = trim($validated['q'] ?? '');
        $category = trim($validated['kategori'] ?? '');

        $productsQuery = Product::query()->active();

        if ($search !== '') {
            $productsQuery->where(function ($query) use ($search): void {
                $query->where('nama_produk', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if ($category !== '') {
            $productsQuery->where('jenis_produk', $category);
        }

        $products = $productsQuery
            ->orderBy('nama_produk')
            ->paginate(12)
            ->withQueryString();

        $categories = Product::query()
            ->active()
            ->whereNotNull('jenis_produk')
            ->where('jenis_produk', '<>', '')
            ->select('jenis_produk')
            ->distinct()
            ->orderBy('jenis_produk')
            ->pluck('jenis_produk');

        return view('produk.index', [
            'products' => $products,
            'categories' => $categories,
            'search' => $search,
            'selectedCategory' => $category,
        ]);
    }

    public function show(string $slug): View
    {
        $product = Product::query()
            ->active()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('produk.show', compact('product'));
    }
}
