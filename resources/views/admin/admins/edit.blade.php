@extends('layouts.admin')

@section('title', 'Edit Admin')
@section('header', 'Edit Admin')

@section('content')
<div class="card p-8 max-w-2xl">
    <form action="{{ route('admin.admins.update', $admin) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Nama</label>
            <input type="text" name="name" class="input-field" value="{{ $admin->name }}" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" name="email" class="input-field" value="{{ $admin->email }}" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">No. Telepon</label>
            <input type="text" name="phone" class="input-field" value="{{ $admin->phone }}">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Role</label>
            <select name="role" class="input-field" required>
                <option value="admin" {{ $admin->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="superadmin" {{ $admin->role === 'superadmin' ? 'selected' : '' }}>SuperAdmin</option>
            </select>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="btn-primary">Update Admin</button>
            <a href="{{ route('admin.admins.index') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection