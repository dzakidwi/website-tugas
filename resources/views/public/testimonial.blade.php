@extends('layouts.public')

@section('title', 'Testimoni')

@section('content')
<section class="bg-gradient-to-br from-primary to-secondary text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-5xl font-bold">Bagikan Testimoni Anda</h2>
        <p class="text-xl mt-4 text-gray-100">Ceritakan pengalaman Anda menikmati soto kami</p>
    </div>
</section>

<section class="py-16">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="card p-8">
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

            <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Nama Anda</label>
                    <input type="text" name="name" class="input-field" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="email" class="input-field" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Foto Profil (Opsional)</label>
                    <input type="file" name="image" class="input-field" accept="image/*">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Rating</label>
                    <div class="flex gap-2">
                        @for($i = 1; $i <= 5; $i++)
                        <label class="cursor-pointer">
                            <input type="radio" name="rating" value="{{ $i }}" class="hidden" data-rating="{{ $i }}">
                            <span class="text-4xl rating-star" data-rating="{{ $i }}">☆</span>
                        </label>
                        @endfor
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Testimoni</label>
                    <textarea name="message" class="input-field" rows="6" placeholder="Ceritakan pengalaman Anda..." required></textarea>
                </div>

                <button type="submit" class="btn-primary w-full">Kirim Testimoni</button>
            </form>
        </div>
    </div>
</section>

<script>
const ratingStars = document.querySelectorAll('.rating-star');
let selectedRating = 0;

ratingStars.forEach(star => {
    star.addEventListener('click', function() {
        selectedRating = this.dataset.rating;
        document.querySelector(`input[value="${selectedRating}"]`).checked = true;
        updateStars();
    });

    star.addEventListener('mouseover', function() {
        const hoverRating = this.dataset.rating;
        ratingStars.forEach(s => {
            s.textContent = s.dataset.rating <= hoverRating ? '★' : '☆';
            s.style.color = s.dataset.rating <= hoverRating ? '#FFD700' : '#ccc';
        });
    });
});

document.querySelector('.rating-star')?.parentElement?.addEventListener('mouseleave', function() {
    updateStars();
});

function updateStars() {
    ratingStars.forEach(star => {
        if (star.dataset.rating <= selectedRating) {
            star.textContent = '★';
            star.style.color = '#FFD700';
        } else {
            star.textContent = '☆';
            star.style.color = '#ccc';
        }
    });
}
</script>
@endsection