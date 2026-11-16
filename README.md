# Web Katalog

Aplikasi katalog produk berbasis **Laravel 12** untuk menampilkan daftar produk, melihat detail, mencari produk, dan memfilter berdasarkan kategori.

Repository: <https://github.com/Arayandra/Web-Katalog>

## Fitur

- Halaman katalog responsif untuk desktop dan perangkat mobile.
- Daftar produk dari database dengan pagination.
- Pencarian berdasarkan nama dan deskripsi produk.
- Filter kategori produk.
- Halaman detail produk dengan URL slug.
- Produk nonaktif otomatis tidak ditampilkan pada katalog publik.
- Data contoh untuk pengembangan lokal.

> Seeder berisi data dan harga contoh. Ganti dengan data katalog sebenarnya sebelum aplikasi digunakan untuk publik.

## Teknologi

- PHP 8.2 atau lebih baru
- Laravel 12
- MySQL/MariaDB atau SQLite
- Node.js dan npm
- Vite dan Tailwind CSS 4

## Persyaratan PHP

Pastikan ekstensi PHP berikut aktif: `ctype`, `curl`, `dom`, `fileinfo`, `filter`, `hash`, `mbstring`, `openssl`, `pcre`, `pdo`, `session`, `tokenizer`, dan `xml`. Untuk SQLite aktifkan juga `pdo_sqlite` dan `sqlite3`; untuk MySQL aktifkan `pdo_mysql`.

## Instalasi di Windows (CMD)

1. Clone repository:

   ```cmd
   git clone https://github.com/Arayandra/Web-Katalog.git
   cd Web-Katalog
   ```

2. Instal dependensi:

   ```cmd
   composer install
   npm install
   ```

3. Buat file environment dan application key:

   ```cmd
   copy .env.example .env
   php artisan key:generate
   ```

4. Secara default aplikasi menggunakan SQLite. Buat file database kosong:

   ```cmd
   if not exist database\database.sqlite type nul > database\database.sqlite
   ```

   Alternatifnya, konfigurasi MySQL pada `.env` dengan mengisi `DB_CONNECTION=mysql`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD`.

5. Jalankan migration dan data contoh:

   ```cmd
   php artisan migrate --seed
   ```

6. Build asset frontend:

   ```cmd
   npm run build
   ```

7. Jalankan server:

   ```cmd
   php artisan serve
   ```

8. Buka <http://127.0.0.1:8000>.

Untuk pengembangan dengan hot reload, jalankan `npm run dev` pada terminal kedua.

## Menambahkan produk

Tambahkan record ke tabel `products` melalui database manager atau buat seeder khusus. Kolom utama:

| Kolom | Keterangan |
| --- | --- |
| `nama_produk` | Nama produk |
| `slug` | URL unik, gunakan huruf kecil dan tanda hubung |
| `jenis_produk` | Kategori produk |
| `deskripsi` | Deskripsi produk |
| `harga` | Harga dalam Rupiah |
| `gambar` | Path gambar relatif terhadap disk `public` (opsional) |
| `is_active` | `1` untuk tampil, `0` untuk disembunyikan |

Simpan gambar produk di `storage/app/public`, lalu jalankan `php artisan storage:link`. Contoh nilai kolom `gambar`: `products/bayam.jpg`.

## Pengujian

Jalankan seluruh test:

```cmd
php artisan test
```

Build asset:

```cmd
npm run build
```

## Keamanan dan deployment

- Jangan commit `.env`, database lokal, log, folder `vendor`, `node_modules`, atau hasil build lokal.
- Gunakan `APP_ENV=production` dan `APP_DEBUG=false` pada server produksi.
- Gunakan HTTPS dan kredensial database khusus untuk aplikasi.
- Jalankan `php artisan config:cache`, `php artisan route:cache`, dan `php artisan view:cache` setelah konfigurasi produksi tervalidasi.
- Jangan gunakan data harga contoh dari seeder sebagai harga operasional.
- Atur izin tulis hanya untuk direktori `storage` dan `bootstrap/cache` pada server.

## Lisensi

Belum ada lisensi khusus yang ditentukan untuk proyek ini.
