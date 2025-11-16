@extends('layouts.frontend')

@section('title', 'Hubungi Kami - Soto Vokasi')
@section('meta_description', 'Hubungi Soto Vokasi untuk reservasi atau pertanyaan')

@push('styles')
<style>
    .page-header {
        margin-top: 72px;
        padding: 60px 0;
        background: #ffffff;
        text-align: center;
    }
</style>
@endpush

@section('content')
    <!-- PAGE HEADER -->
    <div class="page-header">
        <div class="container">
            <h1 class="section-title">Hubungi Kami</h1>
            <p class="section-subtitle">
                Kami senang mendengar dari Anda. Sampaikan pertanyaan atau pesan Anda
            </p>
        </div>
    </div>

    <!-- CONTACT FORM -->
    <section class="section">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success" style="background: #d1fae5; color: #065f46; padding: 16px; border-radius: 8px; margin-bottom: 24px;">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" id="name" name="name" class="form-input" placeholder="Masukkan nama Anda" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-input" placeholder="Masukkan subject" value="{{ old('subject') }}" required>
                    @error('subject')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea id="message" name="message" class="form-textarea" placeholder="Tulis pesan Anda" required>{{ old('message') }}</textarea>
                    @error('message')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="form-button">Kirim Pesan</button>
            </form>
        </div>
    </section>
@endsection
