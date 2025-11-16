@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Produk -->
    <div class="card p-6 bg-gradient-to-br from-blue-50 to-blue-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Produk</p>
                <h3 class="text-3xl font-bold text-primary">{{ $totalProducts }}</h3>
            </div>
            <div class="text-5xl">🍜</div>
        </div>
    </div>

    <!-- Total Testimoni -->
    <div class="card p-6 bg-gradient-to-br from-yellow-50 to-yellow-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Testimoni</p>
                <h3 class="text-3xl font-bold text-primary">{{ $totalTestimoni }}</h3>
            </div>
            <div class="text-5xl">⭐</div>
        </div>
    </div>

    <!-- Pesan Belum Dibaca -->
    <div class="card p-6 bg-gradient-to-br from-red-50 to-red-100">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Pesan Baru</p>
                <h3 class="text-3xl font-bold text-primary">{{ $totalMessages }}</h3>
            </div>
            <div class="text-5xl">📧</div>
        </div>
    </div>
</div>

<div class="card p-6">
    <h3 class="text-xl font-bold text-primary mb-4">Selamat Datang di Admin Panel</h3>
    <p class="text-gray-600">Kelola semua konten website Warung Soto Vokasi dari sini. Pilih menu di sebelah kiri untuk memulai.</p>
</div>
@endsection