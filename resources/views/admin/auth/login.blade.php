<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Warung Soto Vokasi</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gradient-to-br from-primary to-secondary min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-2xl p-8 w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-primary">🍜</h1>
            <h2 class="text-2xl font-bold text-primary mt-4">Login Admin</h2>
            <p class="text-gray-600 mt-2">Warung Soto Vokasi</p>
        </div>

        @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        <form action="{{ route('admin.login.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" name="email" class="input-field" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Password</label>
                <input type="password" name="password" class="input-field" required>
            </div>
            <div class="mt-4 text-center">
    <a href="{{ route('admin.admins.create') }}"
       class="inline-block w-full mt-2 py-2 px-4 bg-secondary text-white font-semibold rounded-lg hover:bg-secondary-dark transition">
        Buat Akun Admin
    </a>
</div>
            <button type="submit" class="w-full btn-primary">Login</button>
        </form>

        <div class="mt-6 p-4 bg-blue-50 rounded text-sm text-gray-600">
            <p><strong>Demo Credentials:</strong></p>
            <p>Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5427212431263530393d3a14233526213a337927