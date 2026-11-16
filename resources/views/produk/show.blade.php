@extends('layouts.app')

@section('title', $product->nama_produk)

@section('content')
    <section class="detail-section">
        <div class="container">
            <a class="back-link" href="{{ route('catalog.index') }}">← Kembali ke katalog</a>
            <div class="detail-grid">
                <div class="detail-image">
                    <span class="product-category">{{ $product->jenis_produk ?: 'Produk segar' }}</span>
                    <img src="{{ $product->gambar ? asset('storage/' . ltrim($product->gambar, '/')) : asset('images/product-placeholder.svg') }}" alt="{{ $product->nama_produk }}">
                </div>
                <div class="detail-copy">
                    <span class="eyebrow"><span class="eyebrow-dot"></span> INFORMASI PRODUK</span>
                    <h1>{{ $product->nama_produk }}</h1>
                    <span class="detail-category">{{ $product->jenis_produk ?: 'Produk segar' }}</span>
                    <p class="detail-description">{{ $product->deskripsi ?: 'Produk pilihan untuk melengkapi kebutuhan sehari-hari.' }}</p>
                    <div class="detail-price-label">Harga katalog</div>
                    <div class="detail-price">Rp {{ number_format((float) $product->harga, 0, ',', '.') }}</div>
                    <p class="detail-note">Harga dan ketersediaan dapat dikonfirmasi kepada pengelola katalog.</p>
                    <a class="button button-primary" href="{{ route('catalog.index') }}">Jelajahi produk lainnya <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
    </section>
@endsection
