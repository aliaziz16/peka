@extends('layouts.app')

@section('content')
<main class="max-w-6xl mx-auto px-4 py-20">
	<div class="text-center mb-10">
		<h1 class="text-4xl font-bold text-emerald-600 mb-4">Sejarah Kepemimpinan Komisariat</h1>
		<p class="text-gray-600 text-lg">
			Berikut adalah sejarah singkat tentang kepemimpinan dari periode ke periode IPNU & IPPNU Komisariat UNWAHA.
		</p>
	</div>

	<div class="grid md:grid-cols-2 gap-10">
		@foreach ($leaders_ipnu as $leader)
		<div class="bg-white p-6 rounded-xl shadow text-center">
			<img src="{{ asset('storage/' . $leader->image) }}" class="w-40 h-40 mx-auto rounded-full mb-4 object-cover border-4 border-emerald-500" alt="{{ $leader->name }}">
			<h2 class="text-xl font-bold">{{ $leader->name }}</h2>
			<p class="text-gray-500">{{ $leader->position }} - {{ $leader->period }}</p>
			<p class="mt-3 text-gray-700 text-sm">{{ $leader->description }}</p>
		</div>
		@endforeach

		@foreach ($leaders_ippnu as $leader)
		<div class="bg-white p-6 rounded-xl shadow text-center">
			<img src="{{ asset('storage/' . $leader->image) }}" class="w-40 h-40 mx-auto rounded-full mb-4 object-cover border-4 border-emerald-500" alt="{{ $leader->name }}">
			<h2 class="text-xl font-bold">{{ $leader->name }}</h2>
			<p class="text-gray-500">{{ $leader->position }} - {{ $leader->period }}</p>
			<p class="mt-3 text-gray-700 text-sm">{{ $leader->description }}</p>
		</div>
		@endforeach
	</div>
</main>
@endsection
