<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f4f7ef">
    <meta name="description" content="Jelajahi katalog sayuran segar dan temukan bahan masakan pilihan untuk kebutuhan sehari-hari.">
    <title>@yield('title', 'Katalog Segar') · Katalog Segar</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="site-shell">
        <header class="site-header">
            <div class="container header-inner">
                <a class="brand" href="{{ route('catalog.index') }}" aria-label="Katalog Segar, halaman utama">
                    <span class="brand-mark" aria-hidden="true">✳</span>
                    <span>Katalog<span class="brand-accent">Segar</span></span>
                </a>
                <nav class="main-nav" aria-label="Navigasi utama">
                    <a href="{{ route('catalog.index') }}" class="{{ request()->routeIs('catalog.index') ? 'is-current' : '' }}">Beranda</a>
                    <a href="{{ route('catalog.index') }}#katalog">Katalog Produk</a>
                </nav>
                <a class="header-action" href="{{ route('catalog.index') }}#katalog">Jelajahi produk <span aria-hidden="true">↗</span></a>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="site-footer">
            <div class="container footer-inner">
                <a class="brand footer-brand" href="{{ route('catalog.index') }}">
                    <span class="brand-mark" aria-hidden="true">✳</span>
                    <span>Katalog<span class="brand-accent">Segar</span></span>
                </a>
                <p>Katalog produk segar untuk inspirasi belanja sehari-hari.</p>
                <span class="footer-note">© {{ now()->year }} Katalog Segar</span>
            </div>
        </footer>
    </div>
</body>
</html>
