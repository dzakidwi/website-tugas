@extends('layouts.admin')

@section('title', 'Edit Produk')
@section('header', 'Edit Produk')

@section('content')
<div class="card p-8 max-w-2xl">
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Nama Produk</label>
            <input type="text" name="name" class="input-field" value="{{ $product->name }}" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Kategori</label>
            <select name="category_id" class="input-field" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
            <textarea name="description" class="input-field" rows="5" required>{{ $product->description }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Harga (Rp)</label>
                <input type="number" name="price" step="1000" class="input-field" value="{{ $product->price }}" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Gambar</label>
                <input type="file" name="image" class="input-field" accept="image/*">
                @if($product->image)
                <p class="text-sm text-gray-600 mt-2">Gambar saat ini: <img src="{{ asset($product->image) }}" class="w-20 h-20 mt-2 rounded"></p>
                @endif
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Bahan-bahan</label>
            <textarea name="ingredients" class="input-field" rows="3">{{ $product->ingredients }}</textarea>
        </div>

        <div>
            <label class="flex items-center">
                <input type="checkbox" name="is_halal" value="1" {{ $product->is_halal ? 'checked' : '' }} class="w-4 h-4 text-primary">
                <span class="ml-2 text-gray-700">Produk Halal</span>
            </label>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="btn-primary">Update Produk</button>
            <a href="{{ route('admin.products.index') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection