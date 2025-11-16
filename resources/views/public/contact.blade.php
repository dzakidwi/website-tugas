@extends('layouts.public')

@section('title', 'Kontak')

@section('content')
<section class="bg-gradient-to-br from-primary to-secondary text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-5xl font-bold">Hubungi Kami</h2>
        <p class="text-xl mt-4 text-gray-100">Kami siap membantu Anda</p>
    </div>
</section>

<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <!-- Contact Info -->
            <div class="card p-8">
                <div class="text-4xl mb-4">📍</div>
                <h3 class="text-xl font-bold text-primary mb-2">Alamat</h3>
                <p class="text-gray-700">Jl. Vocational No. 123, Jakarta Selatan, DKI Jakarta 12345</p>
            </div>

            <div class="card p-8">
                <div class="text-4xl mb-4">📞</div>
                <h3 class="text-xl font-bold text-primary mb-2">Telepon</h3>
                <p class="text-gray-700">(021) 123-4567</p>
                <p class="text-gray-700">WhatsApp: 0812-3456-7890</p>
            </div>

            <div class="card p-8">
                <div class="text-4xl mb-4">⏰</div>
                <h3 class="text-xl font-bold text-primary mb-2">Jam Operasional</h3>
                <p class="text-gray-700">Senin - Jumat: 11:00 - 21:00</p>
                <p class="text-gray-700">Sabtu - Minggu: 10:00 - 22:00</p>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="max-w-2xl mx-auto card p-8">
            <h3 class="text-2xl font-bold text-primary mb-6">Kirim Pesan</h3>

            @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                        <input type="text" name="name" class="input-field" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Email</label>
                        <input type="email" name="email" class="input-field" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">No. Telepon</label>
                        <input type="text" name="phone" class="input-field" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Subjek</label>
                        <input type="text" name="subject" class="input-field" required>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Pesan</label>
                    <textarea name="message" class="input-field" rows="6" required></textarea>
                </div>

                <button type="submit" class="btn-primary w-full">Kirim Pesan</button>
            </form>
        </div>
    </div>
</section>
@endsection