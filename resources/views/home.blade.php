<?php

use Illuminate\Support\Str; ?>
@extends('layouts.app')

@section('content')
<section class="relative bg-center bg-cover text-white min-h-screen flex justify-center" style="background-image: url('images/bg-header.jpeg');">
	<!-- Overlay Gradient -->
	<div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/50 to-black/80"></div>

	<!-- Content -->
	<div class="relative max-w-5xl mx-auto pt-20 text-center px-4 animate-fadeIn">
		<h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight drop-shadow-lg">Selamat Datang</h1>
		<p class="text-lg md:text-xl mb-8 drop-shadow-md">
			di Website Resmi <span class="font-semibold text-emerald-400">Teras Informasi & Kreatifitas</span><br>
			PK IPNU IPPNU Universitas KH. A. Wahab Hasbullah<br>Tambakberas - Jombang
		</p>
	</div>
</section>

<!-- Animasi FadeIn -->
<style>
	@keyframes fadeIn {
		from {
			opacity: 0;
			transform: translateY(30px);
		}

		to {
			opacity: 1;
			transform: translateY(0);
		}
	}

	.animate-fadeIn {
		animation: fadeIn 1.2s ease-out;
	}
</style>
<main class="max-w-7xl mx-auto p-5">
	<!-- Intro Section -->
	<section class="bg-gray-100 text-center py-16">
		<div class="max-w-5xl mx-auto px-4">
			<h4 class="text-emerald-600 font-semibold mb-2">Mari mengenal lebih dekat!</h4>
			<h1 class="text-4xl font-bold mb-4">Sejarah Pimpinan Komisariat</h1>
			<p class="text-gray-600 mb-5 pb-5">
				{{ Str::limit(strip_tags($sejarah->content), 200) }}
			</p>
			<a href="{{ route('blog.show', $sejarah->slug) }}" class="border-2 border-emerald-600 text-emerald-600 py-2 px-4 rounded-xl hover:bg-emerald-600 hover:text-white">
				Selengkapnya...
			</a>
		</div>
	</section>


	<!-- D E P T   &   L E M B -->
	<section class="py-16">
		<div class="text-center">
			<h1 class="text-4xl font-bold mb-4">Departemen & Lembaga</h1>
			<p class="text-gray-600 mb-5 pb-5">PK IPNU IPPNU Universitas KH. A. Wahab Hasbullah</p>
		</div>
		<div class="max-w-7xl mt-5 pt-5 mx-auto grid md:grid-cols-2 gap-10 px-4">
			@foreach($departments as $dept)
			<div class="flex items-start space-x-4">
				<i class="{{ $dept->icon }} text-4xl text-emerald-600"></i>
				<div>
					<h4 class="font-bold text-lg">{{ $dept->name }}</h4>
					<p class="text-gray-600 pb-5">{{ Str::limit($dept->description, 100) }}</p>
					<a href="#" class="border-2 border-emerald-600 text-emerald-600 py-2 px-4 rounded-xl hover:bg-emerald-600 hover:text-white">Selengkapnya...</a>
				</div>
			</div>
			@endforeach
		</div>
	</section>


	<!-- J A J A R A N   K E T U A -->
	<section class="py-16 bg-gray-100">
		<div class="max-w-7xl mx-auto text-center space-y-8 px-8">
			<div class="text-center mb-5">
				<h4 class="text-emerald-600 font-semibold">Menolak Lupa!</h4>
				<h1 class="text-4xl font-bold">Jajaran Ketua dari Periode ke Periode</h1>
			</div>
			<!-- IPNU -->
			<div class="space-y-4">
				<h4 class="text-emerald-600 font-semibold text-2xl">IPNU</h4>
				<div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-4">
					@foreach ($leaders_ipnu as $leader)
					<div class="bg-white rounded-lg shadow p-4 flex flex-col items-center space-y-2">
						<div class="relative w-40 h-40 rounded-full overflow-hidden border-4 border-emerald-600">
							<img src="{{ asset('storage/' . $leader->image) }}" alt="{{ $leader->name }}" class="object-cover w-full h-full">
						</div>
						<h5 class="font-semibold text-lg text-center">{{ $leader->name }}</h5>
						<p class="text-gray-500 text-sm text-center">{{ $leader->period }}</p>
					</div>
					@endforeach
				</div>
			</div>

			<!-- IPPNU -->
			<div class="space-y-4">
				<h4 class="text-emerald-600 font-semibold text-2xl">IPPNU</h4>
				<div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-4">
					@foreach ($leaders_ippnu as $leader)
					<div class="bg-white rounded-lg shadow p-4 flex flex-col items-center space-y-2">
						<div class="relative w-40 h-40 rounded-full overflow-hidden border-4 border-emerald-600">
							<img src="{{ asset('storage/' . $leader->image) }}" alt="{{ $leader->name }}" class="object-cover w-full h-full">
						</div>
						<h5 class="font-semibold text-lg text-center">{{ $leader->name }}</h5>
						<p class="text-gray-500 text-sm text-center">{{ $leader->period }}</p>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>

	<!-- Q U O T E -->
	<section class="py-16 bg-gray-200">
		<div class="max-w-5xl mx-auto text-center px-4">
			<h4 class="text-emerald-600 font-semibold mb-2">Quote</h4>
			<h1 class="text-4xl font-bold mb-10">Kata - kata Hari Ini!</h1>
			<!-- Owl Carousel -->
			<div class="owl-carousel">
				@foreach($quotes as $quote)
				<div class="bg-white shadow rounded-lg p-8 mx-4 space-y-4">
					<p class="text-gray-700 italic">“{{ $quote->content }}”</p>
					<div class="flex flex-col items-center">
						<img src="{{ asset('storage/' . $quote->image) }}" class="rounded-full mb-2 w-16 h-16 object-cover" alt="{{ $quote->author }}">
						<span class="font-bold">{{ $quote->author }}</span>
						<span class="text-gray-500 text-sm">{{ $quote->source }}</span>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>

	<!-- B E R I T A   A C A R A -->
	<section class="py-16 bg-gray-100 mb-20">
		<div class="max-w-7xl mx-auto text-center px-8">
			<h4 class="text-emerald-600 font-semibold mb-2">Berita Acara</h4>
			<h1 class="text-4xl font-bold mb-10">Program Kerja & Kegiatan</h1>

			<div class="grid md:grid-cols-3 gap-8 text-left">
				@foreach ($posts as $post)
				<div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
					<img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
					<div class="p-6 space-y-3">
						<h3 class="text-xl font-bold text-gray-800">{{ $post->title }}</h3>
						<p class="text-gray-600 text-sm">{{ Str::limit($post->content, 100) }}</p>
						<a href="{{ route('blog.show', $post->slug) }}" class="inline-block text-emerald-600 font-semibold hover:underline">
							Lihat Selengkapnya
						</a>
					</div>
				</div>
				@endforeach
			</div>

		</div>
	</section>
</main>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
	$(document).ready(function() {
		$(".owl-carousel").owlCarousel({
			loop: true,
			margin: 20,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			responsive: {
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				1024: {
					items: 3
				}
			}
		});
	});
</script>
@endsection