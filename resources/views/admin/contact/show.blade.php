@extends('layouts.admin')

@section('title', 'Lihat Pesan')
@section('header', 'Detail Pesan')

@section('content')
<div class="card p-8 max-w-2xl">
    <div class="border-b pb-6 mb-6">
        <h3 class="text-2xl font-bold text-primary mb-4">{{ $message->subject }}</h3>
        
        <div class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-gray-600">Nama</p>
                <p class="font-semibold">{{ $message->name }}</p>
            </div>
            <div>
                <p class="text-gray-600">Email</p>
                <p class="font-semibold">{{ $message->email }}</p>
            </div>
            <div>
                <p class="text-gray-600">No. Telepon</p>
                <p class="font-semibold">{{ $message->phone }}</p>
            </div>
            <div>
                <p class="text-gray-600">Tanggal</p>
                <p class="font-semibold">{{ $message->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>
    </div>

    <div class="mb-6">
        <h4 class="font-semibold text-gray-700 mb-3">Pesan</h4>
        <p class="text-gray-700 whitespace-pre-wrap">{{ $message->message }}</p>
    </div>

    <div class="flex gap-4">
        <a href="mailto:{{ $message->email }}" class="btn-primary">Balas Email</a>
        <a href="{{ route('admin.contact.index') }}" class="btn-outline">Kembali</a>
    </div>
</div>
@endsection