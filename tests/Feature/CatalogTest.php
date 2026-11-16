<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogTest extends TestCase
{
    use RefreshDatabase;

    public function test_catalog_page_displays_active_products(): void
    {
        Product::create(['nama_produk' => 'Bayam Hijau', 'slug' => 'bayam-hijau', 'jenis_produk' => 'Sayuran Daun', 'deskripsi' => 'Bayam segar.', 'harga' => 8500, 'is_active' => true]);
        Product::create(['nama_produk' => 'Produk Tersembunyi', 'slug' => 'produk-tersembunyi', 'jenis_produk' => 'Sayuran', 'harga' => 5000, 'is_active' => false]);

        $this->get(route('catalog.index'))
            ->assertOk()
            ->assertSee('Bayam Hijau')
            ->assertDontSee('Produk Tersembunyi');
    }

    public function test_catalog_can_search_by_product_name(): void
    {
        Product::create(['nama_produk' => 'Bayam Hijau', 'slug' => 'bayam-hijau', 'jenis_produk' => 'Sayuran Daun', 'harga' => 8500, 'is_active' => true]);
        Product::create(['nama_produk' => 'Wortel', 'slug' => 'wortel', 'jenis_produk' => 'Sayuran', 'harga' => 12000, 'is_active' => true]);

        $this->get(route('catalog.index', ['q' => 'Bayam']))
            ->assertOk()
            ->assertSee('Bayam Hijau')
            ->assertDontSee('Wortel');
    }

    public function test_catalog_can_filter_by_category(): void
    {
        Product::create(['nama_produk' => 'Bayam Hijau', 'slug' => 'bayam-hijau', 'jenis_produk' => 'Sayuran Daun', 'harga' => 8500, 'is_active' => true]);
        Product::create(['nama_produk' => 'Wortel', 'slug' => 'wortel', 'jenis_produk' => 'Sayuran', 'harga' => 12000, 'is_active' => true]);

        $this->get(route('catalog.index', ['kategori' => 'Sayuran Daun']))
            ->assertOk()
            ->assertSee('Bayam Hijau')
            ->assertDontSee('Wortel');
    }

    public function test_product_detail_is_available_by_slug(): void
    {
        Product::create(['nama_produk' => 'Bayam Hijau', 'slug' => 'bayam-hijau', 'jenis_produk' => 'Sayuran Daun', 'deskripsi' => 'Bayam segar untuk masakan rumahan.', 'harga' => 8500, 'is_active' => true]);

        $this->get(route('catalog.show', 'bayam-hijau'))
            ->assertOk()
            ->assertSee('Bayam Hijau')
            ->assertSee('Bayam segar untuk masakan rumahan.');
    }

    public function test_inactive_product_detail_returns_not_found(): void
    {
        Product::create(['nama_produk' => 'Produk Tidak Aktif', 'slug' => 'produk-tidak-aktif', 'jenis_produk' => 'Sayuran', 'harga' => 10000, 'is_active' => false]);

        $this->get(route('catalog.show', 'produk-tidak-aktif'))
            ->assertNotFound();
    }

    public function test_search_query_is_limited_to_one_hundred_characters(): void
    {
        $this->get(route('catalog.index', ['q' => str_repeat('x', 101)]))
            ->assertSessionHasErrors('q');
    }
}
