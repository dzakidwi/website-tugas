@extends('layouts.frontend')

@section('title', 'FAQ - Soto Vokasi')
@section('meta_description', 'Pertanyaan yang sering diajukan tentang Soto Vokasi')

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
            <h1 class="section-title">FAQ</h1>
            <p class="section-subtitle">
                Temukan jawaban atas pertanyaan yang sering diajukan
            </p>
        </div>
    </div>

    <!-- FAQ SECTION -->
    <section class="section">
        <div class="container">
            <div class="faq-list">
                @forelse($faqs as $faq)
                <div class="faq-item">
                    <button class="faq-question">
                        <span>{{ $faq->question }}</span>
                        <svg class="faq-icon" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p class="faq-answer-content">
                            {{ $faq->answer }}
                        </p>
                    </div>
                </div>
                @empty
                <!-- Default FAQ jika tidak ada data -->
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Jam berapa Soto Vokasi buka?</span>
                        <svg class="faq-icon" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p class="faq-answer-content">
                            Soto Vokasi buka setiap hari dari pukul 08.00 - 21.00 WIB. 
                            Kami siap melayani Anda untuk sarapan, makan siang, hingga makan malam.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Apakah bisa melakukan reservasi tempat?</span>
                        <svg class="faq-icon" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p class="faq-answer-content">
                            Ya, tentu saja! Anda dapat melakukan reservasi tempat melalui WhatsApp kami di +62 877 8571 1752 
                            atau melalui halaman Contact. Reservasi dianjurkan terutama untuk rombongan atau acara khusus.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Apakah tersedia layanan pesan antar?</span>
                        <svg class="faq-icon" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p class="faq-answer-content">
                            Ya, kami menyediakan layanan pesan antar melalui aplikasi GoFood dan GrabFood. 
                            Anda juga dapat memesan langsung melalui WhatsApp kami untuk pengiriman di area sekitar Malang.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Apakah tersedia paket catering untuk acara?</span>
                        <svg class="faq-icon" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div class="faq-answer">
                        <p class="faq-answer-content">
                            Ya, kami menyediakan paket catering untuk berbagai acara seperti ulang tahun, pernikahan, dan acara perusahaan. 
                            Hubungi kami untuk informasi lebih lanjut mengenai paket dan harga catering.
                        </p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
