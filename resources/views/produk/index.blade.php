@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
    <section class="hero-section">
        <div class="container hero-grid">
            <div class="hero-copy">
                <span class="eyebrow"><span class="eyebrow-dot"></span> PILIHAN SEGAR SETIAP HARI</span>
                <h1>Mulai hidup lebih segar, <em>dari pilihanmu.</em></h1>
                <p>Temukan sayuran pilihan untuk melengkapi hidangan dan kebutuhan harianmu. Jelajahi katalog dan pilih yang kamu butuhkan.</p>
                <a class="button button-primary" href="#katalog">Lihat katalog <span aria-hidden="true">↓</span></a>
                <div class="hero-note"><span class="hero-note-icon">✓</span> Katalog praktis, informasi produk jelas</div>
            </div>
            <div class="hero-art" aria-label="Ilustrasi sayuran segar" role="img">
                <div class="art-sun"></div>
                <div class="art-orbit art-orbit-one"></div>
                <div class="art-orbit art-orbit-two"></div>
                <div class="produce produce-one">🥬</div>
                <div class="produce produce-two">🥕</div>
                <div class="produce produce-three">🥦</div>
                <div class="produce produce-four">🍅</div>
                <div class="art-caption"><span>FRESH PICKS</span><strong>Good food, good mood.</strong></div>
                <span class="art-spark spark-one">✳</span><span class="art-spark spark-two">✦</span>
            </div>
        </div>
    </section>

    <section class="catalog-section" id="katalog">
        <div class="container">
            <div class="section-heading">
                <div>
                    <span class="eyebrow">JELAJAHI PILIHAN</span>
                    <h2>Katalog <em>produk</em></h2>
                    <p>Pilih produk yang sesuai dengan kebutuhanmu.</p>
                </div>
                <span class="result-count">{{ $products->total() }} produk ditemukan</span>
            </div>

            <form class="filter-panel" action="{{ route('catalog.index') }}" method="GET">
                <label class="search-box">
                    <span class="search-icon" aria-hidden="true">⌕</span>
                    <span class="sr-only">Cari produk</span>
                    <input type="search" name="q" value="{{ $search }}" placeholder="Cari sayuran favoritmu..." maxlength="100">
                </label>
                <label class="select-box">
                    <span class="sr-only">Filter kategori</span>
                    <select name="kategori">
                        <option value="">Semua kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}" @selected($selectedCategory === $category)>{{ $category }}</option>
                        @endforeach
                    </select>
                </label>
                <button class="button button-dark" type="submit">Cari produk <span aria-hidden="true">→</span></button>
                @if ($search !== '' || $selectedCategory !== '')
                    <a class="reset-link" href="{{ route('catalog.index') }}">Reset</a>
                @endif
            </form>

            @if ($categories->isNotEmpty())
                <div class="category-list" aria-label="Kategori produk">
                    <a class="category-chip {{ $selectedCategory === '' ? 'active' : '' }}" href="{{ route('catalog.index', array_filter(['q' => $search])) }}">Semua</a>
                    @foreach ($categories as $category)
                        <a class="category-chip {{ $selectedCategory === $category ? 'active' : '' }}" href="{{ route('catalog.index', array_filter(['q' => $search, 'kategori' => $category])) }}">{{ $category }}</a>
                    @endforeach
                </div>
            @endif

            @if ($products->isNotEmpty())
                <div class="product-grid">
                    @foreach ($products as $product)
                        <article class="product-card">
                            <a class="product-image" href="{{ route('catalog.show', $product->slug) }}" aria-label="Lihat {{ $product->nama_produk }}">
                                <span class="product-category">{{ $product->jenis_produk ?: 'Produk segar' }}</span>
                                <img src="{{ $product->gambar ? asset('storage/' . ltrim($product->gambar, '/')) : asset('images/product-placeholder.svg') }}" alt="{{ $product->nama_produk }}" loading="lazy">
                                <span class="image-arrow" aria-hidden="true">↗</span>
                            </a>
                            <div class="product-info">
                                <div>
                                    <h3><a href="{{ route('catalog.show', $product->slug) }}">{{ $product->nama_produk }}</a></h3>
                                    <p>{{ \Illuminate\Support\Str::limit($product->deskripsi ?: 'Produk segar pilihan untuk kebutuhan harian.', 76) }}</p>
                                </div>
                                <div class="product-bottom">
                                    <strong>Rp {{ number_format((float) $product->harga, 0, ',', '.') }}</strong>
                                    <a href="{{ route('catalog.show', $product->slug) }}" aria-label="Detail {{ $product->nama_produk }}">Detail <span aria-hidden="true">→</span></a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="pagination-wrap">{{ $products->links() }}</div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">⌕</div>
                    <h3>Produk belum ditemukan</h3>
                    <p>Coba gunakan kata kunci lain atau tampilkan semua kategori.</p>
                    <a class="button button-primary" href="{{ route('catalog.index') }}">Lihat semua produk</a>
                </div>
            @endif
        </div>
    </section>

    <section class="closing-section">
        <div class="container closing-card">
            <div><span class="eyebrow">MULAI DARI YANG SEDERHANA</span><h2>Ide masakan baik dimulai dari <em>bahan yang segar.</em></h2></div>
            <a class="button button-light" href="#katalog">Jelajahi katalog <span aria-hidden="true">↗</span></a>
            <span class="closing-decoration" aria-hidden="true">✳</span>
        </div>
    </section>
@endsection
