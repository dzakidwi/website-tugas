@extends('layouts.admin')

@section('title', 'Tambah Kategori')
@section('header', 'Tambah Kategori Baru')

@section('content')
<div class="card p-8 max-w-2xl">
    <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Nama Kategori</label>
            <input type="text" name="name" class="input-field" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
            <textarea name="description" class="input-field" rows="5"></textarea>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="btn-primary">Simpan Kategori</button>
            <a href="{{ route('admin.categories.index') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection