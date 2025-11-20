@extends('layouts.frontend')

@section('title', 'Testimoni - Soto Vokasi')
@section('meta_description', 'Lihat apa kata pelanggan kami tentang Soto Vokasi')

@push('styles')
<style>
    .page-header {
        margin-top: 72px;
        padding: 60px 0;
        background: #ffffff;
        text-align: center;
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
    <!-- PAGE HEADER -->
    <div class="page-header">
        <div class="container">
            <h1 class="section-title">Apa Kata Mereka?</h1>
            <p class="section-subtitle">
                Testimoni dari pelanggan setia Soto Vokasi
            </p>
        </div>
    </div>

    <!-- TESTIMONIALS SECTION -->
    <section class="section">
        <div class="container">
            <div class="testimonial-grid">
                @forelse($testimonials as $testimonial)
                <div class="testimonial-card">
                    <div class="testimonial-quote">"{{ Str::limit($testimonial->message, 30) }}"</div>
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
                <!-- Empty State -->
                <div class="empty-state">
                    <div class="empty-state-icon">💬</div>
                    <h3>Belum Ada Testimoni</h3>
                    <p>Jadilah yang pertama membagikan pengalaman Anda dengan Soto Vokasi!</p>
                </div>
                @endforelse
            </div>

            <!-- TESTIMONIAL FORM -->
            <div style="margin-top: 60px; max-width: 600px; margin-left: auto; margin-right: auto;">
                <h2 class="section-title" style="margin-bottom: 32px;">Bagikan Pengalaman Anda</h2>
                
                @if(session('success'))
                    <div class="alert alert-success" style="background: #d1fae5; color: #065f46; padding: 16px; border-radius: 8px; margin-bottom: 24px;">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data" class="contact-form">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" id="name" name="name" class="form-input" placeholder="Masukkan nama Anda" value="{{ old('name') }}" required>
                        @error('name')
                            <span class="error-text" style="color: #dc2626; font-size: 14px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="location" class="form-label">Lokasi (Opsional)</label>
                        <input type="text" id="location" name="location" class="form-input" placeholder="Kota, Provinsi" value="{{ old('location') }}">
                        @error('location')
                            <span class="error-text" style="color: #dc2626; font-size: 14px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rating" class="form-label">Rating</label>
                        <select id="rating" name="rating" class="form-input" required>
                            <option value="">Pilih rating</option>
                            <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5)</option>
                            <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (4)</option>
                            <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>⭐⭐⭐ (3)</option>
                            <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>⭐⭐ (2)</option>
                            <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>⭐ (1)</option>
                        </select>
                        @error('rating')
                            <span class="error-text" style="color: #dc2626; font-size: 14px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label">Testimoni</label>
                        <textarea id="message" name="message" class="form-textarea" placeholder="Ceritakan pengalaman Anda" required>{{ old('message') }}</textarea>
                        @error('message')
                            <span class="error-text" style="color: #dc2626; font-size: 14px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label">Foto (Opsional)</label>
                        <input type="file" id="image" name="image" class="form-input" accept="image/*">
                        @error('image')
                            <span class="error-text" style="color: #dc2626; font-size: 14px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="form-button">Kirim Testimoni</button>
                    <p style="text-align: center; margin-top: 16px; color: #6b7280; font-size: 14px;">
                        Testimoni Anda akan ditampilkan setelah disetujui oleh admin
                    </p>
                </form>
            </div>
        </div>
    </section>
@endsection