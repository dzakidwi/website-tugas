@extends('layouts.public')

@section('title', 'Tentang Kami')

@section('content')
<section class="bg-gradient-to-br from-primary to-secondary text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-5xl font-bold">Tentang Warung Soto Vokasi</h2>
        <p class="text-xl mt-4 text-gray-100">Warisan cita rasa tradisional sejak 1990</p>
    </div>
</section>

<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <h3 class="text-3xl font-bold text-primary mb-4">Sejarah Kami</h3>
                <p class="text-gray-700 mb-4">Warung Soto Vokasi dimulai dari passion sederhana untuk menghadirkan cita rasa soto autentik yang telah diwariskan turun-temurun. Dengan resep rahasia yang telah disempurnakan selama puluhan tahun, kami berkomitmen menghadirkan kelezatan yang tak terlupakan.</p>
                <p class="text-gray-700">Setiap mangkuk soto kami dibuat dengan bahan-bahan pilihan berkualitas tinggi, tanpa bahan pengawet, untuk memastikan kesegaran dan kelezatan yang maksimal.</p>
            </div>
            <div class="bg-gray-300 rounded-lg h-64 flex items-center justify-center text-6xl">
                🍜
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <div class="card p-8 text-center">
                <div class="text-5xl mb-4">👨‍🍳</div>
                <h4 class="text-xl font-bold text-primary mb-2">Resep Tradisional</h4>
                <p class="text-gray-600">Menggunakan resep turun-temurun dengan sentuhan inovasi modern</p>
            </div>
            <div class="card p-8 text-center">
                <div class="text-5xl mb-4">✅</div>
                <h4 class="text-xl font-bold text-primary mb-2">Bahan Berkualitas</h4>
                <p class="text-gray-600">Semua bahan dipilih dengan teliti untuk kualitas terbaik</p>
            </div>
            <div class="card p-8 text-center">
                <div class="text-5xl mb-4">🏅</div>
                <h4 class="text-xl font-bold text-primary mb-2">Terpercaya</h4>
                <p class="text-gray-600">Dipercaya oleh ribuan pelanggan sejak puluhan tahun lalu</p>
            </div>
        </div>

        <div class="card p-8 bg-gradient-to-r from-primary/10 to-secondary/10">
            <h3 class="text-2xl font-bold text-primary mb-4">Visi & Misi</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h4 class="font-bold text-lg text-primary mb-2">Visi</h4>
                    <p class="text-gray-700">Menjadi warung soto terdepan yang dikenal karena kualitas, kebersihan, dan pelayanan terbaik</p>
                </div>
                <div>
                    <h4 class="font-bold text-lg text-primary mb-2">Misi</h4>
                    <p class="text-gray-700">Memberikan pengalaman kuliner yang memuaskan dengan harga terjangkau dan layanan yang ramah</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection