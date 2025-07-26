<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<section class="py-12 px-4 bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-emerald-700">Dashboard Admin</h1>
            <div class="flex space-x-4">
                <a href="{{ route('admin.logout') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Logout
                </a>
            </div>
        </div>

        <!-- Navigation Menu -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <a href="{{ route('admin.posts.index') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 bg-emerald-100 rounded-lg">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">Kelola Berita</h3>
                        <p class="text-sm text-gray-600">Tambah, edit, dan hapus berita</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.categories.index') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">Kelola Kategori</h3>
                        <p class="text-sm text-gray-600">Kelola kategori berita</p>
                    </div>
                </div>
            </a>

            <a href="/" target="_blank" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">Lihat Website</h3>
                        <p class="text-sm text-gray-600">Buka website di tab baru</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-emerald-100 rounded-lg">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ App\Models\Post::count() }}</h3>
                        <p class="text-sm text-gray-600">Total Berita</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ App\Models\Category::count() }}</h3>
                        <p class="text-sm text-gray-600">Total Kategori</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-100 rounded-lg">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ App\Models\Post::whereDate('created_at', today())->count() }}</h3>
                        <p class="text-sm text-gray-600">Berita Hari Ini</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Posts -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-900">Berita Terbaru</h2>
                <a href="{{ route('admin.posts.index') }}" class="text-emerald-600 hover:text-emerald-800 text-sm">Lihat Semua</a>
            </div>
            
            @if($posts->count() > 0)
                <div class="space-y-4">
                    @foreach($posts->take(5) as $post)
                    <div class="flex items-center justify-between p-4 border rounded-lg hover:bg-gray-50">
                        <div class="flex items-center space-x-4">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-12 h-12 object-cover rounded">
                            @else
                                <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                    <span class="text-gray-500 text-xs">No Image</span>
                                </div>
                            @endif
                            <div>
                                <h3 class="font-medium text-gray-900">{{ $post->title }}</h3>
                                <p class="text-sm text-gray-600">{{ $post->category->name ?? 'Tanpa Kategori' }} • {{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-yellow-600 hover:text-yellow-800 text-sm">Edit</a>
                            <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm">Lihat</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 text-gray-500">
                    <p>Belum ada berita. <a href="{{ route('admin.posts.create') }}" class="text-emerald-600 hover:underline">Tambah berita pertama</a></p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
