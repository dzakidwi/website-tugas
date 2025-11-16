@extends('layouts.frontend')

@section('title', 'Tentang Kami - Soto Vokasi')
@section('meta_description', 'Kenali lebih dekat Soto Vokasi dan cerita di balik kelezatan soto kami')

@push('styles')
<style>
    .page-header {
        margin-top: 72px;
        padding: 60px 0;
        background: #f9fafb;
        text-align: center;
    }
    .stats-section {
        padding: 60px 0;
        background: #ffffff;
    }
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 32px;
        margin-top: 40px;
    }
    .stat-item {
        text-align: center;
        padding: 24px;
        background: #f9fafb;
        border-radius: 12px;
    }
    .stat-number {
        font-size: 48px;
        font-weight: 700;
        color: #d97706;
        margin-bottom: 8px;
    }
    .stat-label {
        font-size: 16px;
        color: #6b7280;
    }
</style>
@endpush

@section('content')
    <!-- ABOUT SECTION -->
    <section class="section section-hero-about">
        <div class="container">
            <div class="about-grid">
                <div class="about-hero-image">
                    <img src="{{ asset('images/about/warung.png') }}" alt="Warung Soto Vokasi">
                    
                    <div class="contact-card">
                        <h4>Datang dan Kunjungi Kami</h4>
                        <p>+62 877 8571 1752</p>
                        <p>sotovokasi@gmail.com</p>
                        <p>Jl. Veteran Jl. Cikampek No.15, Kota Malang, Jawa Timur</p>
                    </div>
                </div>
                
                <div class="about-content">
                    <h2>Cerita Hangat dari Semangkuk Soto</h2>
                    <p>
                        Soto Vokasi hadir dari mimpi sederhana: melestarikan resep otentik warisan keluarga. 
                        Sejak 2010, kami berkomitmen menyajikan soto yang tidak hanya lezat, tapi juga mampu 
                        membangkitkan kenangan dan kehangatan dalam setiap suapannya.
                    </p>
                    <p>
                        Kami percaya bahwa makanan enak berasal dari bahan-bahan terbaik dan dibuat dengan 
                        penuh cinta. Setiap mangkuk soto yang kami sajikan adalah hasil dari dedikasi kami 
                        untuk mempertahankan cita rasa autentik. Datang dan cicipi sendiri perbedaannya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="banner-section">
        <div class="banner-content">
            <h2>Dari ide sederhana<br>hingga menjadi favorit di hati Anda.</h2>
        </div>
    </section>

    <section class="section features-section-about">
        <div class="container">
            <div class="features-grid-about">
                <div class="feature-item-about">
                    <img src="{{ asset('images/icons/resep.png') }}" alt="Ikon Resep" class="feature-icon">
                    <h3>Resep Rahasia</h3>
                    <p>Cita rasa otentik dari bahan pilihan dan bumbu rahasia warisan keluarga.</p>
                </div>
                <div class="feature-item-about">
                    <img src="{{ asset('images/icons/pesanan.png') }}" alt="Ikon Pesan" class="feature-icon">
                    <h3>Mudah Dipesan</h3>
                    <p>Tersedia di GoFood, GrabFood, & ShopeeFood. Pesan soto favorit Anda kapan saja.</p>
                </div>
                <div class="feature-item-about">
                    <img src="{{ asset('images/icons/kirim.png') }}" alt="Ikon Kirim" class="feature-icon">
                    <h3>Pengiriman Cepat</h3>
                    <p>Driver kami siap mengantarkan pesanan Anda dalam kondisi hangat dan cepat sampai.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section founder-section">
        <div class="container">
            <div class="founder-grid">
                <div class="founder-content">
                    <h2>Sang Peracik Rasa</h2>
                    <h3 class="founder-name">Bapak Hadi Santoso</h3>
                    <p>
                        Dengan pengalaman lebih dari satu dekade, Bapak Hadi adalah hati dan jiwa dari dapur Soto Vokasi. 
                        Kecintaannya pada kuliner tradisional menginspirasi kami untuk terus menjaga kualitas.
                    </p>
                    
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-number">2</div>
                            <div class="stat-label">Lokasi</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">2010</div>
                            <div class="stat-label">Didirikan</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">4</div>
                            <div class="stat-label">Anggota Staf</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">100%</div>
                            <div class="stat-label">Pelanggan Puas</div>
                        </div>
                    </div>
                </div>
                
                <div class="founder-image">
                    <img src="{{ asset('images/about/paklek.png') }}" alt="Bapak Hadi Santoso">
                </div>
            </div>
        </div>
    </section>
@endsection
