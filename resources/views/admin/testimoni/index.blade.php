@extends('layouts.admin')

@section('title', 'Testimoni')
@section('header', 'Kelola Testimoni')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
    <div class="card p-4 bg-blue-50">
        <p class="text-gray-600 text-sm">Total Testimoni</p>
        <h3 class="text-2xl font-bold text-primary">{{ $testimoni->count() }}</h3>
    </div>
    <div class="card p-4 bg-green-50">
        <p class="text-gray-600 text-sm">Disetujui</p>
        <h3 class="text-2xl font-bold text-green-600">{{ $testimoni->where('is_approved', true)->count() }}</h3>
    </div>
    <div class="card p-4 bg-yellow-50">
        <p class="text-gray-600 text-sm">Menunggu</p>
        <h3 class="text-2xl font-bold text-yellow-600">{{ $testimoni->where('is_approved', false)->count() }}</h3>
    </div>
</div>

<div class="space-y-4">
    @forelse($testimoni as $item)
    <div class="card p-6 border-l-4 {{ $item->is_approved ? 'border-green-500' : 'border-yellow-500' }}">
        <div class="flex items-start justify-between">
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-2">
                    @if($item->image)
                    <img src="{{ asset($item->image) }}" class="w-12 h-12 rounded-full">
                    @else
                    <div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center">👤</div>
                    @endif
                    <div>
                        <h4 class="font-semibold">{{ $item->name }}</h4>
                        <p class="text-sm text-gray-600">{{ $item->email }}</p>
                    </div>
                </div>
                <div class="flex gap-1 my-2">
                    @for($i = 0; $i < $item->rating; $i++)
                    <span class="text-yellow-400">⭐</span>
                    @endfor
                </div>
                <p class="text-gray-700 italic">{{ $item->message }}</p>
                <p class="text-xs text-gray-500 mt-2">{{ $item->created_at->format('d M Y H:i') }}</p>
            </div>
            <div class="space-y-2">
                @if(!$item->is_approved)
                <form action="{{ route('admin.testimoni.approve', $item) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="block w-full px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 text-sm">
                        Setujui
                    </button>
                </form>
                @else
                <span class="block w-full px-4 py-2 bg-green-100 text-green-700 rounded text-sm text-center">
                    ✓ Disetujui
                </span>
                @endif
                <form action="{{ route('admin.testimoni.reject', $item) }}" method="POST" class="inline" onclick="return confirm('Hapus testimoni ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="block w-full px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="card p-6 text-center text-gray-500">
        Tidak ada testimoni
    </div>
    @endforelse
</div>
@endsection