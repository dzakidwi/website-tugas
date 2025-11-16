@extends('layouts.admin')

@section('title', 'Pesan')
@section('header', 'Pesan dari Pengunjung')

@section('content')
<div class="card overflow-hidden">
    <table class="w-full">
        <thead class="bg-primary text-white">
            <tr>
                <th class="px-6 py-3 text-left">Nama</th>
                <th class="px-6 py-3 text-left">Email</th>
                <th class="px-6 py-3 text-left">Subjek</th>
                <th class="px-6 py-3 text-left">Status</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $message)
            <tr class="border-b hover:bg-gray-50 {{ !$message->is_read ? 'bg-blue-50' : '' }}">
                <td class="px-6 py-4 font-semibold">{{ $message->name }}</td>
                <td class="px-6 py-4">{{ $message->email }}</td>
                <td class="px-6 py-4">{{ $message->subject }}</td>
                <td class="px-6 py-4">
                    <span class="{{ $message->is_read ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} px-3 py-1 rounded-full text-sm">
                        {{ $message->is_read ? 'Dibaca' : 'Baru' }}
                    </span>
                </td>
                <td class="px-6 py-4 text-center space-x-2">
                    <a href="{{ route('admin.contact.show', $message) }}" class="text-blue-600 hover:underline">Lihat</a>
                    <form action="{{ route('admin.contact.destroy', $message) }}" method="POST" class="inline" onclick="return confirm('Hapus pesan?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada pesan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection