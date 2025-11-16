@extends('layouts.admin')

@section('title', 'Admin')
@section('header', 'Kelola Admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h3 class="text-xl font-bold">Daftar Admin</h3>
    <a href="{{ route('admin.admins.create') }}" class="btn-primary">+ Tambah Admin</a>
</div>

<div class="card overflow-hidden">
    <table class="w-full">
        <thead class="bg-primary text-white">
            <tr>
                <th class="px-6 py-3 text-left">Nama</th>
                <th class="px-6 py-3 text-left">Email</th>
                <th class="px-6 py-3 text-left">Role</th>
                <th class="px-6 py-3 text-left">No. Telp</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($admins as $admin)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 font-semibold">{{ $admin->name }}</td>
                <td class="px-6 py-4">{{ $admin->email }}</td>
                <td class="px-6 py-4">
                    <span class="{{ $admin->role === 'superadmin' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }} px-3 py-1 rounded-full text-sm">
                        {{ ucfirst($admin->role) }}
                    </span>
                </td>
                <td class="px-6 py-4">{{ $admin->phone ?? '-' }}</td>
                <td class="px-6 py-4 text-center space-x-2">
                    <a href="{{ route('admin.admins.edit', $admin) }}" class="text-blue-600 hover:underline">Edit</a>
                    @if($admin->id !== session()->get('admin_id'))
                    <form action="{{ route('admin.admins.destroy', $admin) }}" method="POST" class="inline" onclick="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada admin</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection