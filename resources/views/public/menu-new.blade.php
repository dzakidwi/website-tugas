@extends('layouts.frontend')

@section('title', 'Menu - Soto Vokasi')
@section('meta_description', 'Lihat menu lengkap Soto Vokasi dengan berbagai pilihan soto dan minuman')

@push('styles')
<style>
    .menu-header {
        margin-top: 72px;
        padding: 60px 0 40px;
        background: #ffffff;
        text-align: center;
    }
    .menu-filters {
        display: flex;
        gap: 12px;
        justify-content: center;
        margin-top: 32px;
        flex-wrap: wrap;
    }
    .menu-filter {
        padding: 10px 24px;
        background: #ffffff;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .menu-filter:hover {
        background: #f3f4f6;
        border-color: #d97706;
    }
    .menu-filter.active {
        background: #d97706 !important;
        color: #ffffff !important;
        border-color: #d97706 !important;
    }
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        width: 100%;
        grid-column: 1 / -1;
    }
    .empty-state h3 {
        color: #374151;
        font-size: 28px;
        margin-bottom: 16px;
        font-weight: 600;
    }
    .empty-state p {
        color: #6b7280;
        font-size: 16px;
        line-height: 1.6;
    }
    .empty-state-icon {
        font-size: 64px;
        margin-bottom: 24px;
        opacity: 0.5;
    }
</style>
@endpush

@section('content')
    <!-- MENU HEADER -->
    <div class="menu-header">
        <div class="container">
            <h1 class="section-title">Menu Kami</h1>
            <p class="section-subtitle">
                Nikmati racikan bumbu warisan dalam semangkuk soto hangat yang kami siapkan khusus untuk Anda
            </p>
            <div class="menu-filters">
                <button class="menu-filter active" data-filter="all">Semua</button>
                <button class="menu-filter" data-filter="makanan">Makanan</button>
                <button class="menu-filter" data-filter="minuman">Minuman</button>
            </div>
        </div>
    </div>

    <!-- MENU ITEMS -->
    <section class="section">
        <div class="container">
            <div class="menu-grid">
                @forelse($products as $product)
                <div class="menu-card" data-category="{{ $product->category ? strtolower($product->category->name) : 'makanan' }}">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="menu-card-image">
                    @else
                        <img src="{{ asset('images/menu/soto-ayam-spesial.png') }}" alt="{{ $product->name }}" class="menu-card-image">
                    @endif
                    <div class="menu-card-content">
                        <div class="menu-card-price">{{ \App\Helpers\Helper::formatRupiah($product->price) }}</div>
                        <h3 class="menu-card-title">{{ $product->name }}</h3>
                        <p class="menu-card-description">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
                @empty
                <!-- Pesan jika belum ada produk -->
                <div class="empty-state">
                    <div class="empty-state-icon">🍜</div>
                    <h3>Belum Ada Menu Tersedia</h3>
                    <p>Menu sedang dalam persiapan. Silakan cek kembali nanti atau hubungi kami untuk informasi lebih lanjut.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- JAVASCRIPT LANGSUNG DI SINI -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Filter menu by category
            const filters = document.querySelectorAll('.menu-filter');
            const menuCards = document.querySelectorAll('.menu-card');
            
            console.log('Filters found:', filters.length); // Debug
            console.log('Menu cards found:', menuCards.length); // Debug
            
            filters.forEach(filter => {
                filter.addEventListener('click', function() {
                    console.log('Button clicked:', this.getAttribute('data-filter')); // Debug
                    
                    // Remove active class from all filters
                    filters.forEach(f => f.classList.remove('active'));
                    
                    // Add active class to clicked filter
                    this.classList.add('active');
                    
                    const filterValue = this.getAttribute('data-filter');
                    
                    // Filter menu cards
                    menuCards.forEach(card => {
                        const category = card.getAttribute('data-category');
                        console.log('Card category:', category); // Debug
                        
                        if (filterValue === 'all' || category === filterValue) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
@endsection