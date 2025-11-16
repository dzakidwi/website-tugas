@extends('layouts.frontend')

@section('title', 'Soto Vokasi - Soto Otentik Sejak 2010')
@section('meta_description', 'Nikmati kelezatan soto otentik dengan resep warisan keluarga di Malang sejak 2010')

@section('content')
    <!-- HERO SECTION -->
    <section id="home" class="hero">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <h1>Kelezatan Otentik,<br>Disajikan Hangat</h1>
                <p>Rasakan cita rasa soto warisan yang tak terlupakan. Setiap mangkuk penuh cerita, setiap suapan penuh kehangatan.</p>
                <a href="{{ route('menu') }}" class="btn-primary">Lihat Menu</a>
            </div>
        </div>
    </section>

    <!-- MENU SECTION -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Menu Unggulan Kami</h2>
            <p class="section-subtitle">
                Nikmati berbagai pilihan soto dengan resep rahasia keluarga
            </p>
            
            <div class="menu-grid">
                @forelse($products as $product)
                <div class="menu-card">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="menu-card-image">
                    @else
                        <img src="{{ asset('images/menu/soto-ayam-spesial.png') }}" alt="{{ $product->name }}" class="menu-card-image">
                    @endif
                    <div class="menu-card-content">
                        <div class="menu-card-price">{{ \App\Helpers\Helper::formatRupiah($product->price) }}</div>
                        <h3 class="menu-card-title">{{ $product->name }}</h3>
                        <p class="menu-card-description">
                            {{ Str::limit($product->description, 100) }}
                        </p>
                    </div>
                </div>
                @empty
                <!-- Default menu jika tidak ada produk -->
                <div class="menu-card">
                    <img src="{{ asset('images/menu/soto-ayam-spesial.png') }}" alt="Soto Ayam Spesial" class="menu-card-image">
                    <div class="menu-card-content">
                        <div class="menu-card-price">Rp 15.000</div>
                        <h3 class="menu-card-title">Soto Ayam Spesial</h3>
                        <p class="menu-card-description">
                            Soto ayam dengan kuah bening kaya rempah, suwiran ayam, soun, tauge, dan telur rebus
                        </p>
                    </div>
                </div>

                <div class="menu-card">
                    <img src="{{ asset('images/menu/soto-daging-sapi.png') }}" alt="Soto Daging Sapi" class="menu-card-image">
                    <div class="menu-card-content">
                        <div class="menu-card-price">Rp 20.000</div>
                        <h3 class="menu-card-title">Soto Daging Sapi</h3>
                        <p class="menu-card-description">
                            Potongan daging sapi empuk dengan kuah kaldu sapi yang gurih dan aromatik
                        </p>
                    </div>
                </div>

                <div class="menu-card">
                    <img src="{{ asset('images/menu/paket-vokasi-juara.png') }}" alt="Paket Vokasi Juara" class="menu-card-image">
                    <div class="menu-card-content">
                        <div class="menu-card-price">Rp 22.000</div>
                        <h3 class="menu-card-title">Paket Vokasi Juara</h3>
                        <p class="menu-card-description">
                            Paket hemat: Soto Ayam Spesial + Nasi + Es Teh Manis. Lengkap dan mengenyangkan!
                        </p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="section" style="background: #f9fafb;">
        <div class="container">
            <div class="about-grid">
                <div>
                    <img src="{{ asset('images/about/warung.png') }}" alt="Warung Soto Vokasi" class="about-image">
                </div>
                <div class="about-content">
                    <h2>Cerita Hangat dari Semangkuk Soto</h2>
                    <p>
                        Soto Vokasi hadir dari mimpi sederhana: melestarikan resep otentik warisan keluarga. 
                        Sejak 2020, kami berkomitmen menyajikan soto yang tidak hanya lezat, tapi juga mampu 
                        membangkitkan kenangan dan kehangatan dalam setiap suapannya.
                    </p>
                    <p>
                        Kami percaya bahwa makanan enak berasal dari bahan-bahan terbaik dan dibuat dengan 
                        penuh cinta. Datang dan coba sendiri perbedaannya.
                    </p>
                    <a href="{{ route('about') }}" class="about-button">Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="services-section">
        <div class="container">
            <h2 class="section-title">Kami juga menawarkan layanan unik untuk acara Anda</h2>

            <div class="services-grid">
                <div class="service-item">
                    <img src="{{ asset('images/index/katering.png') }}" alt="Catering">
                    <h3>Catering</h3>
                    <p>Layanan catering untuk berbagai acara dengan menu soto spesial yang lezat dan berkualitas.</p>
                </div>

                <div class="service-item">
                    <img src="{{ asset('images/index/ultah.png') }}" alt="Ulang Tahun">
                    <h3>Ulang Tahun</h3>
                    <p>Rayakan hari spesial Anda dengan hidangan soto yang menggugah selera untuk semua tamu.</p>
                </div>

                <div class="service-item">
                    <img src="{{ asset('images/index/nikah.png') }}" alt="Pernikahan">
                    <h3>Pernikahan</h3>
                    <p>Sajikan kelezatan soto otentik di hari bahagia Anda dengan layanan catering pernikahan kami.</p>
                </div>

                <div class="service-item">
                    <img src="{{ asset('images/index/hajatan.png') }}" alt="Hajatan">
                    <h3>Hajatan</h3>
                    <p>Untuk acara hajatan dan perayaan besar, kami siap melayani dengan menu yang istimewa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section class="section" style="background: #f9fafb;">
        <div class="container">
            <h2 class="section-title">Apa Kata Mereka?</h2>
            <p class="section-subtitle">
                Testimoni dari pelanggan setia Soto Vokasi
            </p>
            
            <div class="testimonial-grid">
                @forelse($testimonials->take(3) as $testimonial)
                <div class="testimonial-card">
                    <div class="testimonial-quote">"{{ Str::limit($testimonial->message, 50) }}"</div>
                    <p class="testimonial-text">
                        {{ $testimonial->message }}
                    </p>
                    <div class="testimonial-author">
                        @if($testimonial->image)
                            <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" class="testimonial-avatar">
                        @else
                            <img src="{{ asset('images/customers/customer1.png') }}" alt="{{ $testimonial->name }}" class="testimonial-avatar">
                        @endif
                        <div class="testimonial-info">
                            <h4>{{ $testimonial->name }}</h4>
                            <p>{{ $testimonial->location ?? 'Malang, Jawa Timur' }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <!-- Default testimonials jika tidak ada data -->
                <div class="testimonial-card">
                    <div class="testimonial-quote">"Restoran terbaik"</div>
                    <p class="testimonial-text">
                        Pelayanannya ramah dan cepat. Saya coba paket lengkap dan porsinya sangat mengenyangkan.
                    </p>
                    <div class="testimonial-author">
                        <img src="{{ asset('images/customers/customer1.png') }}" alt="M. Dzaki Dwi Putra" class="testimonial-avatar">
                        <div class="testimonial-info">
                            <h4>M. Dzaki Dwi Putra</h4>
                            <p>Mojokerto, Jawa Timur</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-quote">"Sangat lezat"</div>
                    <p class="testimonial-text">
                        Sotonya benar-benar otentik! Kuahnya kaya rasa dan dagingnya empuk. Tempatnya juga bersih dan nyaman.
                    </p>
                    <div class="testimonial-author">
                        <img src="{{ asset('images/customers/customer2.png') }}" alt="M. Habib Masyhur" class="testimonial-avatar">
                        <div class="testimonial-info">
                            <h4>M. Habib Masyhur</h4>
                            <p>Demak, Jawa Tengah</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-quote">"Restoran yang unik"</div>
                    <p class="testimonial-text">
                        Tempat yang pas untuk makan siang bersama teman-teman kantor. Suasananya adem.
                    </p>
                    <div class="testimonial-author">
                        <img src="{{ asset('images/customers/customer3.png') }}" alt="Mahiendra Fikri" class="testimonial-avatar">
                        <div class="testimonial-info">
                            <h4>Mahiendra Fikri</h4>
                            <p>Blitar, Jawa Timur</p>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
