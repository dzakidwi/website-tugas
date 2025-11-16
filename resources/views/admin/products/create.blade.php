@extends('layouts.admin')

@section('title', 'Tambah Produk')
@section('header', 'Tambah Produk Baru')

@section('content')
<div class="card p-8 max-w-2xl">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Nama Produk</label>
            <input type="text" name="name" class="input-field" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Kategori</label>
            <select name="category_id" class="input-field" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
            <textarea name="description" class="input-field" rows="5" required></textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Harga (Rp)</label>
                <input type="number" name="price" step="1000" class="input-field" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Gambar</label>
                <input type="file" name="image" class="input-field" accept="image/*">
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Bahan-bahan</label>
            <textarea name="ingredients" class="input-field" rows="3"></textarea>
        </div>

        <div>
            <label class="flex items-center">
                <input type="checkbox" name="is_halal" value="1" checked class="w-4 h-4 text-primary">
                <span class="ml-2 text-gray-700">Produk Halal</span>
            </label>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="btn-primary">Simpan Produk</button>
            <a href="{{ route('admin.products.index') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection