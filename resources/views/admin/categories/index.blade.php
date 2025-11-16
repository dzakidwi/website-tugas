@extends('layouts.admin')

@section('title', 'Kategori')
@section('header', 'Daftar Kategori')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h3 class="text-xl font-bold">Kelola Kategori</h3>
    <a href="{{ route('admin.categories.create') }}" class="btn-primary">+ Tambah Kategori</a>
</div>

<div class="card overflow-hidden">
    <table class="w-full">
        <thead class="bg-primary text-white">
            <tr>
                <th class="px-6 py-3 text-left">Nama</th>
                <th class="px-6 py-3 text-left">Deskripsi</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 font-semibold">{{ $category->name }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $category->description ?? '-' }}</td>
                <td class="px-6 py-4 text-center space-x-2">
                    <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onclick="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="px-6 py-4 text-center text-gray-500">Tidak ada kategori</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection