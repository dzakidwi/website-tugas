<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Admin Baru - Warung Soto Vokasi</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gradient-to-br from-primary to-secondary min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-2xl p-8 w-full max-w-md">

        <div class="text-center mb-6">
            <h1 class="text-4xl font-bold text-primary">🍜</h1>
            <h2 class="text-2xl font-bold text-primary mt-4">Buat Admin Baru</h2>
            <p class="text-gray-600">Warung Soto Vokasi</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.admins.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Nama -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Nama Admin</label>
                <input type="text" name="name" class="input-field" required>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email" class="input-field" required>
            </div>

            <!-- Password -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Password</label>
                <input type="password" name="password" class="input-field" required>
            </div>

            <!-- Password Confirmation -->
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="input-field" required>
            </div>

            <button type="submit" class="w-full btn-primary">Buat Admin</button>

            <div class="mt-6 text-center">
                <a href="{{ route('admin.login') }}" class="text-primary font-semibold hover:underline">
                    Kembali ke Login
                </a>
            </div>
        </form>
    </div>
</body>
</html>
