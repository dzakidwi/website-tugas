@extends('layouts.admin')

@section('title', 'Edit FAQ')
@section('header', 'Edit FAQ')

@section('content')
<div class="card p-8 max-w-2xl">
    <form action="{{ route('admin.faqs.update', $faq) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Pertanyaan</label>
            <input type="text" name="question" class="input-field" value="{{ $faq->question }}" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Jawaban</label>
            <textarea name="answer" class="input-field" rows="8" required>{{ $faq->answer }}</textarea>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="btn-primary">Update FAQ</button>
            <a href="{{ route('admin.faqs.index') }}" class="btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection