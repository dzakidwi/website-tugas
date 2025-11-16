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
    .menu-filter:hover,
    .menu-filter.active {
        background: #d97706;
        color: #ffffff;
        border-color: #d97706;
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
                @foreach($categories as $category)
                    <button class="menu-filter" data-filter="{{ $category->id }}">{{ $category->name }}</button>
                @endforeach
            </div>
        </div>
    </div>

    <!-- MENU ITEMS -->
    <section class="section">
        <div class="container">
            <div class="menu-grid">
                @forelse($products as $product)
                <div class="menu-card" data-category="{{ $product->category_id ?? 'all' }}">
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
                <!-- Default menu items jika belum ada data -->
                <div class="menu-card" data-category="makanan">
                    <img src="{{ asset('images/menu/soto-ayam-spesial.png') }}" alt="Soto Ayam Spesial" class="menu-card-image">
                    <div class="menu-card-content">
                        <div class="menu-card-price">Rp 15.000</div>
                        <h3 class="menu-card-title">Soto Ayam Spesial</h3>
                        <p class="menu-card-description">
                            Soto ayam dengan kuah bening kaya rempah, suwiran ayam, soun, tauge, dan telur rebus
                        </p>
                    </div>
                </div>

                <div class="menu-card" data-category="makanan">
                    <img src="{{ asset('images/menu/soto-daging-sapi.png') }}" alt="Soto Daging Sapi" class="menu-card-image">
                    <div class="menu-card-content">
                        <div class="menu-card-price">Rp 20.000</div>
                        <h3 class="menu-card-title">Soto Daging Sapi</h3>
                        <p class="menu-card-description">
                            Potongan daging sapi empuk dengan kuah kaldu sapi yang gurih dan aromatik
                        </p>
                    </div>
                </div>

                <div class="menu-card" data-category="minuman">
                    <img src="{{ asset('images/menu/es-teh-manis.png') }}" alt="Es Teh Manis" class="menu-card-image">
                    <div class="menu-card-content">
                        <div class="menu-card-price">Rp 3.000</div>
                        <h3 class="menu-card-title">Es Teh Manis</h3>
                        <p class="menu-card-description">
                            Teh segar dengan tingkat manis yang pas, disajikan dingin untuk kesegaran maksimal
                        </p>
                    </div>
                </div>

                <div class="menu-card" data-category="makanan">
                    <img src="{{ asset('images/menu/paket-vokasi-juara.png') }}" alt="Paket Vokasi Juara" class="menu-card-image">
                    <div class="menu-card-content">
                        <div class="menu-card-price">Rp 22.000</div>
                        <h3 class="menu-card-title">Paket Vokasi Juara</h3>
                        <p class="menu-card-description">
                            Paket hemat: Soto Ayam Spesial + Nasi + Es Teh Manis. Lengkap dan mengenyangkan!
                        </p>
                    </div>
                </div>

                <div class="menu-card" data-category="makanan">
                    <img src="{{ asset('images/menu/soto-ayam-biasa.png') }}" alt="Soto Ayam Biasa" class="menu-card-image">
                    <div class="menu-card-content">
                        <div class="menu-card-price">Rp 12.000</div>
                        <h3 class="menu-card-title">Soto Ayam Biasa</h3>
                        <p class="menu-card-description">
                            Soto ayam klasik dengan porsi standar, tetap enak dan mengenyangkan
                        </p>
                    </div>
                </div>

                <div class="menu-card" data-category="minuman">
                    <img src="{{ asset('images/menu/es-dawet.png') }}" alt="Es Dawet" class="menu-card-image">
                    <div class="menu-card-content">
                        <div class="menu-card-price">Rp 10.000</div>
                        <h3 class="menu-card-title">Es Dawet</h3>
                        <p class="menu-card-description">
                            Perpaduan sempurna antara dawet pandan kenyal, santan segar, dan saus gula aren legit
                        </p>
                    </div>
                </div>

                <div class="menu-card" data-category="minuman">
                    <img src="{{ asset('images/menu/air-es.png') }}" alt="Air Es" class="menu-card-image">
                    <div class="menu-card-content">
                        <div class="menu-card-price">Rp 1.000</div>
                        <h3 class="menu-card-title">Air Es</h3>
                        <p class="menu-card-description">
                            Air mineral dingin yang menyegarkan, cocok untuk menemani hidangan
                        </p>
                    </div>
                </div>

                <div class="menu-card" data-category="minuman">
                    <img src="{{ asset('images/menu/es-jeruk.png') }}" alt="Es Jeruk" class="menu-card-image">
                    <div class="menu-card-content">
                        <div class="menu-card-price">Rp 5.000</div>
                        <h3 class="menu-card-title">Es Jeruk</h3>
                        <p class="menu-card-description">
                            Dibuat dari perasan buah jeruk segar, tanpa tambahan pemanis buatan
                        </p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Filter menu by category
    const filters = document.querySelectorAll('.menu-filter');
    const menuCards = document.querySelectorAll('.menu-card');
    
    filters.forEach(filter => {
        filter.addEventListener('click', function() {
            // Remove active class from all filters
            filters.forEach(f => f.classList.remove('active'));
            // Add active class to clicked filter
            this.classList.add('active');
            
            const filterValue = this.getAttribute('data-filter');
            
            menuCards.forEach(card => {
                if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush
