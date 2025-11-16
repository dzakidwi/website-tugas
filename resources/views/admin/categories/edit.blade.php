@extends('layouts.admin')

@section('title', 'Edit Kategori')
@section('header', 'Edit Kategori')

@section('content')
<div class="card p-8 max-w-2xl">
    <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Nama Kategori</label>
            <input type="text" name="name" class="input-field" value="{{ $category->name }}" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
            <textarea name="description" class="input-field" rows="5">{{ $category->description }}</textarea>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="btn-primary">Update Kategori</button>
            <a href="{{ route('admin.categories.index') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection