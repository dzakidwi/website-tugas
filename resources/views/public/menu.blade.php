@extends('layouts.public')

@section('title', 'Menu')

@section('content')
<section class="bg-gradient-to-br from-primary to-secondary text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-5xl font-bold">Menu Kami</h2>
        <p class="text-xl mt-4 text-gray-100">Pilihan soto dan lauk pelengkap berkualitas tinggi</p>
    </div>
</section>

<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Search & Filter -->
        <div class="mb-8 space-y-4">
            <input type="text" id="search" placeholder="Cari menu..." class="input-field w-full">
            
            <div class="flex flex-wrap gap-2">
                <button class="category-filter px-4 py-2 rounded-lg bg-primary text-white" data-category="">Semua</button>
                @foreach($categories as $category)
                <button class="category-filter px-4 py-2 rounded-lg border-2 border-primary text-primary hover:bg-primary hover:text-white transition" data-category="{{ $category->id }}">
                    {{ $category->name }}
                </button>
                @endforeach
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="products-container">
            @forelse($products as $product)
            <div class="card product-card overflow-hidden" data-category="{{ $product->category_id }}" data-name="{{ strtolower($product->name) }}">
                @if($product->image)
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-300 flex items-center justify-center text-4xl">🍜</div>
                @endif
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold text-primary">{{ $product->name }}</h3>
                        @if($product->is_halal)
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-semibold">Halal</span>
                        @endif
                    </div>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($product->description, 80) }}</p>
                    <p class="text-gray-500 text-xs mb-3">Kategori: {{ $product->category->name }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-accent">{{ \App\Helpers\Helper::formatRupiah($product->price) }}</span>
                        <a href="{{ route('product.detail', $product) }}" class="btn-primary text-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-gray-600 text-lg">Tidak ada menu ditemukan</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<script>
document.getElementById('search').addEventListener('keyup', function() {
    filterProducts();
});

document.querySelectorAll('.category-filter').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.category-filter').forEach(b => {
            b.classList.remove('bg-primary', 'text-white');
            b.classList.add('border-2', 'border-primary', 'text-primary');
        });
        this.classList.add('bg-primary', 'text-white');
        this.classList.remove('border-2', 'border-primary', 'text-primary');
        filterProducts();
    });
});

function filterProducts() {
    const searchTerm = document.getElementById('search').value.toLowerCase();
    const categoryId = document.querySelector('.category-filter.bg-primary').dataset.category;
    
    document.querySelectorAll('.product-card').forEach(card => {
        const matchName = card.dataset.name.includes(searchTerm);
        const matchCategory = categoryId === '' || card.dataset.category === categoryId;
        
        card.style.display = (matchName && matchCategory) ? 'block' : 'none';
    });
}
</script>
@endsection