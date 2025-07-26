@extends('layouts.app')

@section('content')
<section class="relative bg-center bg-cover text-white min-h-screen flex justify-center" style="background-image: url('images/bg-header.jpeg');">
	<div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/50 to-black/80"></div>

	<div class="relative max-w-5xl mx-auto pt-20 text-center px-4 animate-fadeIn">
		<h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight drop-shadow-lg">{{ $department->name }}</h1>
		<p class="text-lg md:text-xl mb-8 drop-shadow-md">
			Departemen / Lembaga - PK IPNU IPPNU UNWAHA
		</p>
	</div>
</section>

<section class="py-16 bg-white">
	<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 px-4">
		<!-- Main Content -->
		<div class="md:col-span-3 space-y-8">
			<article class="space-y-4">
				<h2 class="text-3xl font-bold">{{ $department->name }}</h2>
				<div class="flex items-center space-x-4 text-gray-500 text-sm">
					<i class="{{ $department->icon }} text-2xl text-emerald-600"></i>
					<span>Struktur & Program Kerja</span>
				</div>
				<div class="prose max-w-none mt-4">
					{!! nl2br(e($department->description)) !!}
				</div>
			</article>
		</div>

		<!-- Sidebar -->
		<aside class="space-y-8">
			<div class="bg-gray-100 p-4 rounded-xl">
				<h4 class="font-bold mb-3">Navigasi</h4>
				<a href="{{ url('/') }}" class="block text-emerald-600 hover:underline">Kembali ke Beranda</a>
			</div>
			<div class="bg-gray-100 p-4 rounded-xl">
				<h4 class="font-bold mb-3">Kategori</h4>
				<span class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-sm">{{ $department->name }}</span>
			</div>
		</aside>
	</div>
</section>
@endsection
