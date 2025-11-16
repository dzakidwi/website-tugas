@extends('layouts.admin')

@section('title', 'Produk')
@section('header', 'Daftar Produk')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h3 class="text-xl font-bold">Kelola Produk</h3>
    <a href="{{ route('admin.products.create') }}" class="btn-primary">+ Tambah Produk</a>
</div>

<div class="card overflow-hidden">
    <table class="w-full">
        <thead class="bg-primary text-white">
            <tr>
                <th class="px-6 py-3 text-left">Nama</th>
                <th class="px-6 py-3 text-left">Kategori</th>
                <th class="px-6 py-3 text-left">Harga</th>
                <th class="px-6 py-3 text-left">Halal</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">{{ $product->name }}</td>
                <td class="px-6 py-4">{{ $product->category->name }}</td>
                <td class="px-6 py-4">{{ \App\Helpers\Helper::formatRupiah($product->price) }}</td>
                <td class="px-6 py-4">
                    <span class="{{ $product->is_halal ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} px-3 py-1 rounded-full text-sm">
                        {{ $product->is_halal ? '✓ Halal' : '✗ Tidak' }}
                    </span>
                </td>
                <td class="px-6 py-4 text-center space-x-2">
                    <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onclick="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada produk</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection