@extends('layouts.admin')

@section('title', 'Tambah Admin')
@section('header', 'Tambah Admin Baru')

@section('content')
<div class="card p-8 max-w-2xl">
    <form action="{{ route('admin.admins.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Nama</label>
            <input type="text" name="name" class="input-field" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" name="email" class="input-field" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">No. Telepon</label>
            <input type="text" name="phone" class="input-field">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Password</label>
            <input type="password" name="password" class="input-field" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="input-field" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Role</label>
            <select name="role" class="input-field" required>
                <option value="admin">Admin</option>
                <option value="superadmin">SuperAdmin</option>
            </select>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="btn-primary">Tambah Admin</button>
            <a href="{{ route('admin.admins.index') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection