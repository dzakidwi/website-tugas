@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-primary to-secondary text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-5xl md:text-6xl font-bold mb-4">Selamat Datang di Warung Soto Vokasi</h2>
        <p class="text-xl md:text-2xl text-gray-100 mb-8">Rasakan kelezatan soto tradisional dengan cita rasa yang tak terlupakan</p>
        <a href="{{ route('menu') }}" class="inline-block bg-white text-primary px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition">
            Lihat Menu
        </a>
    </div>
</section>

<!-- Featured Products -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-primary text-center mb-12">Menu Pilihan Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products as $product)
            <div class="card overflow-hidden">
                @if($product->image)
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-300 flex items-center justify-center text-4xl">🍜</div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-bold text-primary mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($product->description, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-accent">{{ \App\Helpers\Helper::formatRupiah($product->price) }}</span>
                        <a href="{{ route('product.detail', $product) }}" class="text-primary hover:text-secondary font-semibold">Lihat →</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-primary text-center mb-12">Apa Kata Pelanggan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($testimoni as $item)
            <div class="card p-6">
                <div class="flex items-center gap-4 mb-4">
                    @if($item->image)
                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="w-12 h-12 rounded-full object-cover">
                    @else
                    <div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">👤</div>
                    @endif
                    <div>
                        <h4 class="font-bold">{{ $item->name }}</h4>
                        <div class="flex gap-1">
                            @for($i = 0; $i < $item->rating; $i++)
                            <span class="text-yellow-400">⭐</span>
                            @endfor
                        </div>
                    </div>
                </div>
                <p class="text-gray-700 italic">{{ $item->message }}</p>
            </div>
            @empty
            <p class="text-center text-gray-600 col-span-3">Belum ada testimoni</p>
            @endforelse
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('testimonial') }}" class="btn-primary">Bagikan Testimoni Anda</a>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-primary text-center mb-12">Pertanyaan Sering Diajukan</h2>
        <div class="space-y-4" id="faq-container">
            @forelse($faqs as $faq)
            <details class="card p-6 cursor-pointer">
                <summary class="font-bold text-primary flex justify-between items-center">
                    {{ $faq->question }}
                    <span class="text-2xl">+</span>
                </summary>
                <p class="text-gray-700 mt-4">{{ $faq->answer }}</p>
            </details>
            @empty
            <p class="text-center text-gray-600">Tidak ada FAQ</p>
            @endforelse
        </div>
    </div>
</section>
@endsection