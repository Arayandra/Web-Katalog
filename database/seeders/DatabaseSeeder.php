<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the catalogue with sample products for local development.
     * These prices are demo values and should be replaced before production use.
     */
    public function run(): void
    {
        $products = [
            ['nama_produk' => 'Bayam Hijau', 'slug' => 'bayam-hijau', 'jenis_produk' => 'Sayuran Daun', 'deskripsi' => 'Bayam hijau segar untuk tumisan, sayur bening, dan aneka hidangan rumahan.', 'harga' => 8500],
            ['nama_produk' => 'Kangkung Segar', 'slug' => 'kangkung-segar', 'jenis_produk' => 'Sayuran Daun', 'deskripsi' => 'Kangkung segar yang cocok untuk cah kangkung dan menu sehari-hari.', 'harga' => 7000],
            ['nama_produk' => 'Brokoli', 'slug' => 'brokoli', 'jenis_produk' => 'Sayuran', 'deskripsi' => 'Brokoli untuk sup, tumisan, atau pelengkap menu sehat.', 'harga' => 18000],
            ['nama_produk' => 'Wortel', 'slug' => 'wortel', 'jenis_produk' => 'Sayuran', 'deskripsi' => 'Wortel segar untuk sup, jus, dan beragam masakan.', 'harga' => 12000],
            ['nama_produk' => 'Tomat Merah', 'slug' => 'tomat-merah', 'jenis_produk' => 'Sayuran Buah', 'deskripsi' => 'Tomat merah untuk sambal, saus, salad, dan masakan rumahan.', 'harga' => 10000],
            ['nama_produk' => 'Timun', 'slug' => 'timun', 'jenis_produk' => 'Sayuran Buah', 'deskripsi' => 'Timun segar yang nikmat sebagai lalapan dan bahan acar.', 'harga' => 7500],
            ['nama_produk' => 'Selada Keriting', 'slug' => 'selada-keriting', 'jenis_produk' => 'Sayuran Daun', 'deskripsi' => 'Selada dengan tekstur renyah untuk salad, sandwich, dan lalapan.', 'harga' => 11000],
            ['nama_produk' => 'Paprika Merah', 'slug' => 'paprika-merah', 'jenis_produk' => 'Sayuran', 'deskripsi' => 'Paprika merah untuk tumisan, salad, dan aneka masakan.', 'harga' => 16000],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                [...$product, 'is_active' => true, 'gambar' => null],
            );
        }
    }
}
