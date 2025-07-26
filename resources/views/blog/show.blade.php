@extends('layouts.app')

@section('content')
<section class="relative bg-center bg-cover text-white min-h-screen flex justify-center" style="background-image: url('images/bg-header.jpe');">
	<div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/50 to-black/80"></div>

	<div class="relative max-w-5xl mx-auto pt-20 text-center px-4 animate-fadeIn">
		<h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight drop-shadow-lg">{{ $post->title }}</h1>
		<p class="text-lg md:text-xl mb-8 drop-shadow-md">
			{{ $post->category->name ?? 'Tanpa Kategori' }}
		</p>
	</div>
</section>

<section class="py-16 bg-white">
	<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 px-4">
		<!-- Main Content -->
		<div class="md:col-span-3 space-y-8">
			<article class="space-y-4">
				<h2 class="text-3xl font-bold">{{ $post->title }}</h2>
				<div class="flex flex-wrap text-gray-500 space-x-4 text-sm">
					<span><i class="fa fa-clock mr-1"></i>{{ $post->created_at->format('d M Y') }}</span>
					<span><i class="fa fa-user mr-1"></i>Admin</span>
					<span><i class="fa fa-folder-open mr-1"></i>{{ $post->category->name }}</span>
				</div>
				@if($post->image)
					<img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full rounded-xl">
				@endif
				<div class="prose max-w-none">
					{!! nl2br(e($post->content)) !!}
				</div>
			</article>
		</div>

		<!-- Sidebar -->
		<aside class="space-y-8">
			<div class="bg-gray-100 p-4 rounded-xl">
				<h4 class="font-bold mb-3">Search</h4>
				<input type="text" placeholder="Search..." class="w-full p-2 rounded-md border">
			</div>
			<div class="bg-gray-100 p-4 rounded-xl">
				<h4 class="font-bold mb-3">Tags</h4>
				@foreach ($post->category ? [$post->category->name] : [] as $tag)
					<span class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-sm">{{ $tag }}</span>
				@endforeach
			</div>
		</aside>
	</div>
</section>

<!-- Optional Download Section -->
<section class="py-16 text-gray-900">
	<div class="max-w-5xl mx-auto text-center space-y-6">
		<h2 class="text-4xl font-bold">Dapatkan Info Kegiatan Lainnya</h2>
		<p class="text-lg">Kunjungi Instagram TITIK PEKA</p>
		<div class="flex justify-center flex-wrap gap-4">
			<a href="https://instagram.com" class="bg-white text-emerald-700 font-bold px-6 py-3 rounded-lg shadow hover:scale-105 transition">Instagram</a>
			<a href="#" class="bg-white text-emerald-700 font-bold px-6 py-3 rounded-lg shadow hover:scale-105 transition">Kontak</a>
		</div>
	</div>
</section>
@endsection
