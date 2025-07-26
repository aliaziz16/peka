@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-4">
    <h2 class="text-2xl font-bold mb-4 text-emerald-700">Tambah Berita</h2>

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Judul</label>
            <input type="text" name="title" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Kategori</label>
            <select name="category_id" class="w-full border px-3 py-2 rounded">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Konten</label>
            <textarea name="content" rows="6" class="w-full border px-3 py-2 rounded" required></textarea>
        </div>

        <button type="submit" class="bg-emerald-600 text-white px-4 py-2 rounded hover:bg-emerald-700">Simpan</button>
    </form>
</div>
@endsection
