@extends('layouts.admin')

@section('title', 'FAQ')
@section('header', 'Kelola FAQ')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h3 class="text-xl font-bold">Daftar FAQ</h3>
    <a href="{{ route('admin.faqs.create') }}" class="btn-primary">+ Tambah FAQ</a>
</div>

<div class="space-y-4">
    @forelse($faqs as $faq)
    <div class="card p-6 border-l-4 border-primary">
        <div class="flex justify-between items-start">
            <div class="flex-1">
                <h4 class="font-semibold text-lg text-primary">{{ $faq->question }}</h4>
                <p class="text-gray-600 mt-2">{{ $faq->answer }}</p>
            </div>
            <div class="space-x-2">
                <a href="{{ route('admin.faqs.edit', $faq) }}" class="text-blue-600 hover:underline">Edit</a>
                <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="inline" onclick="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="card p-6 text-center text-gray-500">
        Tidak ada FAQ
    </div>
    @endforelse
</div>
@endsection