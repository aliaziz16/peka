@extends('layouts.app')

@section('content')
<section class="py-12 px-4 bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-emerald-700">Kelola Kategori</h1>
            <a href="{{ route('admin.categories.create') }}" class="bg-emerald-600 text-white px-4 py-2 rounded hover:bg-emerald-700">
                + Tambah Kategori
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Daftar Kategori -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-emerald-100 text-emerald-700">
                            <th class="p-3 border text-left">Nama Kategori</th>
                            <th class="p-3 border text-left">Deskripsi</th>
                            <th class="p-3 border text-center">Jumlah Berita</th>
                            <th class="p-3 border text-left">Tanggal Dibuat</th>
                            <th class="p-3 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 border">
                                <div class="font-medium text-gray-900">{{ $category->name }}</div>
                            </td>
                            <td class="p-3 border">
                                <div class="text-sm text-gray-600">
                                    {{ $category->description ?? 'Tidak ada deskripsi' }}
                                </div>
                            </td>
                            <td class="p-3 border text-center">
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                                    {{ $category->posts_count }} berita
                                </span>
                            </td>
                            <td class="p-3 border text-sm text-gray-600">
                                {{ $category->created_at->format('d M Y H:i') }}
                            </td>
                            <td class="p-3 border text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" 
                                       class="text-yellow-600 hover:text-yellow-800 text-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-800 text-sm"
                                                onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">
                                Belum ada kategori. <a href="{{ route('admin.categories.create') }}" class="text-emerald-600 hover:underline">Tambah kategori pertama</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($categories->hasPages())
                <div class="mt-6">
                    {{ $categories->links() }}
                </div>
            @endif
        </div>
    </div>
</section>
@endsection