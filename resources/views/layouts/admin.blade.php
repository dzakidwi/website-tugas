<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Warung Soto Vokasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-primary text-white shadow-lg">
            <div class="p-6 border-b border-secondary">
                <h1 class="text-2xl font-bold">Soto Admin</h1>
                <p class="text-sm text-gray-200">Warung Soto Vokasi</p>
            </div>

            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block px-6 py-3 hover:bg-secondary {{ request()->routeIs('admin.dashboard') ? 'bg-secondary' : '' }}">
                    📊 Dashboard
                </a>
                <a href="{{ route('admin.categories.index') }}" class="block px-6 py-3 hover:bg-secondary {{ request()->routeIs('admin.categories.*') ? 'bg-secondary' : '' }}">
                    📂 Kategori
                </a>
                <a href="{{ route('admin.products.index') }}" class="block px-6 py-3 hover:bg-secondary {{ request()->routeIs('admin.products.*') ? 'bg-secondary' : '' }}">
                    🍜 Produk
                </a>
                <a href="{{ route('admin.testimoni.index') }}" class="block px-6 py-3 hover:bg-secondary {{ request()->routeIs('admin.testimoni.*') ? 'bg-secondary' : '' }}">
                    ⭐ Testimoni
                </a>
                <a href="{{ route('admin.faqs.index') }}" class="block px-6 py-3 hover:bg-secondary {{ request()->routeIs('admin.faqs.*') ? 'bg-secondary' : '' }}">
                    ❓ FAQ
                </a>
                <a href="{{ route('admin.contact.index') }}" class="block px-6 py-3 hover:bg-secondary {{ request()->routeIs('admin.contact.*') ? 'bg-secondary' : '' }}">
                    📧 Pesan
                </a>
                
                @if(session()->get('admin_role') === 'superadmin')
                <hr class="my-2 border-secondary">
                <a href="{{ route('admin.admins.index') }}" class="block px-6 py-3 hover:bg-secondary {{ request()->routeIs('admin.admins.*') ? 'bg-secondary' : '' }}">
                    👥 Kelola Admin
                </a>
                @endif
            </nav>

            <div class="absolute bottom-0 left-0 right-0 p-6 bg-secondary border-t border-primary">
                <p class="text-sm mb-3">Admin: {{ \App\Helpers\Helper::getAdminName() }}</p>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 px-4 py-2 rounded text-white">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto">
            <header class="bg-white shadow">
                <div class="px-8 py-4 flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-primary">@yield('header')</h2>
                </div>
            </header>

            <div class="p-8">
                @if($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>