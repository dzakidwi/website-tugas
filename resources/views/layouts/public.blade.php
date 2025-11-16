<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Warung Soto Vokasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-2">
                    <span class="text-3xl">🍜</span>
                    <div>
                        <h1 class="text-xl font-bold text-primary">Warung Soto</h1>
                        <p class="text-xs text-gray-600">Vokasi</p>
                    </div>
                </div>

                <div class="hidden md:flex gap-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary {{ request()->routeIs('home') ? 'font-bold text-primary' : '' }}">Beranda</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-primary {{ request()->routeIs('about') ? 'font-bold text-primary' : '' }}">Tentang Kami</a>
                    <a href="{{ route('menu') }}" class="text-gray-700 hover:text-primary {{ request()->routeIs('menu') ? 'font-bold text-primary' : '' }}">Menu</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary {{ request()->routeIs('contact') ? 'font-bold text-primary' : '' }}">Kontak</a>
                </div>

                <div class="md:hidden">
                    <button id="menu-btn" class="text-primary">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4 space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Beranda</a>
                <a href="{{ route('about') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Tentang Kami</a>
                <a href="{{ route('menu') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Menu</a>
                <a href="{{ route('contact') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">Warung Soto Vokasi</h3>
                    <p class="text-gray-200">Cita rasa autentik soto yang menggugah selera, dibuat dengan resep tradisional dan bahan berkualitas.</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Navigasi</h3>
                    <ul class="space-y-2 text-gray-200">
                        <li><a href="{{ route('home') }}" class="hover:text-white">Beranda</a></li>
                        <li><a href="{{ route('menu') }}" class="hover:text-white">Menu</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Hubungi Kami</h3>
                    <p class="text-gray-200">📍 Jl. Vocational, Jakarta</p>
                    <p class="text-gray-200">📞 (021) 123-4567</p>
                    <p class="text-gray-200">📧 <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f990979f96b98e988b8c979e8a968d96d79a9694">[email&#160;protected]</a></p>
                </div>
            </div>
            <div class="border-t border-secondary pt-8 text-center text-gray-200">
                <p>&copy; 2025 Warung Soto Vokasi. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
     