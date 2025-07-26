@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-center bg-cover text-white min-h-screen flex justify-center" style="background-image: url('images/bg-header.jpeg');">
	<div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/50 to-black/80"></div>
	<div class="relative max-w-5xl mx-auto pt-20 text-center px-4 animate-fadeIn">
		<h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">Kumpulan Berita Acara</h1>
		<p class="text-lg md:text-xl drop-shadow-md">Kegiatan dan informasi terbaru PK IPNU IPPNU UNWAHA</p>
	</div>
</section>

<!-- Berita List -->
<section class="py-16 bg-gray-100">
	<div class="max-w-7xl mx-auto px-4">
		<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
			@foreach ($posts as $post)
			<div class="bg-white rounded-xl shadow hover:shadow-xl overflow-hidden transition duration-300">
				<img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
				<div class="p-6 space-y-3">
					<span class="text-sm text-emerald-500 font-semibold uppercase">{{ $post->category->name ?? 'Tanpa Kategori' }}</span>
					<h3 class="text-xl font-bold text-gray-800 hover:text-emerald-600 transition">{{ $post->title }}</h3>
					<p class="text-gray-600 text-sm leading-relaxed">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 100) }}</p>
					<div class="flex justify-between items-center text-sm text-gray-400">
						<span><i class="fa fa-clock mr-1"></i>{{ $post->created_at->format('d M Y') }}</span>
						<a href="{{ route('blog.show', $post->slug) }}" class="text-emerald-600 hover:underline">Lihat Selengkapnya</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		<!-- Pagination (opsional jika banyak data) -->
		<div class="mt-10">
			{{ $posts->links('vendor.pagination.custom') }}
		</div>
	</div>
</section>
@endsection
