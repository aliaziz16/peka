<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<section class="py-12 px-4 bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-emerald-700 mb-6">Dashboard Admin</h1>

        <!-- Tombol Tambah Berita -->
        <div class="mb-6">
            <a href="{{ route('admin.posts.create') }}" class="bg-emerald-600 text-white px-4 py-2 rounded hover:bg-emerald-700">
                + Tambah Berita
            </a>
        </div>

        <!-- Daftar Berita -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold mb-4">Daftar Berita</h2>
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-emerald-100 text-emerald-700">
                        <th class="p-3 border">Judul</th>
                        <th class="p-3 border">Kategori</th>
                        <th class="p-3 border">Tanggal</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr class="text-center hover:bg-gray-50">
                        <td class="p-3 border">{{ $post->title }}</td>
                        <td class="p-3 border">{{ $post->category->name ?? '-' }}</td>
                        <td class="p-3 border">{{ $post->created_at->format('d M Y') }}</td>
                        <td class="p-3 border space-x-2">
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6">
                {{ $posts->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
</section>
@endsection
