<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the catalogue with sample products for local development.
     * These names and prices are demo data and should be replaced before production use.
     */
    public function run(): void
    {
        $products = [
            ['nama_produk' => 'Laptop Stand', 'slug' => 'laptop-stand', 'jenis_produk' => 'Aksesori Komputer', 'deskripsi' => 'Stand laptop untuk membantu mengatur posisi layar saat bekerja.', 'harga' => 125000],
            ['nama_produk' => 'Botol Minum 750 ml', 'slug' => 'botol-minum-750-ml', 'jenis_produk' => 'Perlengkapan', 'deskripsi' => 'Botol minum praktis untuk digunakan di rumah, kantor, atau saat bepergian.', 'harga' => 45000],
            ['nama_produk' => 'Buku Catatan A5', 'slug' => 'buku-catatan-a5', 'jenis_produk' => 'Alat Tulis', 'deskripsi' => 'Buku catatan ukuran A5 untuk menulis ide dan agenda harian.', 'harga' => 28000],
            ['nama_produk' => 'Lampu Meja LED', 'slug' => 'lampu-meja-led', 'jenis_produk' => 'Perlengkapan', 'deskripsi' => 'Lampu meja LED untuk membantu pencahayaan area kerja atau belajar.', 'harga' => 95000],
            ['nama_produk' => 'Mouse Wireless', 'slug' => 'mouse-wireless', 'jenis_produk' => 'Aksesori Komputer', 'deskripsi' => 'Mouse nirkabel untuk penggunaan komputer sehari-hari.', 'harga' => 85000],
            ['nama_produk' => 'Headphone Bluetooth', 'slug' => 'headphone-bluetooth', 'jenis_produk' => 'Elektronik', 'deskripsi' => 'Headphone nirkabel untuk mendengarkan audio saat bekerja atau bersantai.', 'harga' => 175000],
            ['nama_produk' => 'Tas Kanvas', 'slug' => 'tas-kanvas', 'jenis_produk' => 'Aksesori', 'deskripsi' => 'Tas kanvas serbaguna untuk membawa barang kebutuhan harian.', 'harga' => 65000],
            ['nama_produk' => 'Organizer Meja', 'slug' => 'organizer-meja', 'jenis_produk' => 'Perlengkapan', 'deskripsi' => 'Organizer untuk menyimpan alat tulis dan aksesori meja.', 'harga' => 52000],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                [...$product, 'is_active' => true, 'gambar' => null],
            );
        }
    }
}
