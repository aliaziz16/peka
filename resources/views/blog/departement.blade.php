<section class="py-16">
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4">Departemen & Lembaga</h1>
        <p class="text-gray-600 mb-10">PK IPNU IPPNU Universitas KH. A. Wahab Hasbullah</p>
    </div>

    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-8 px-4">
        @foreach($departments as $dept)
        <div class="flex items-start space-x-4">
            <img src="{{ asset('storage/' . $dept->image) }}" class="w-20 h-20 rounded-xl object-cover" alt="{{ $dept->name }}">
            <div>
                <h4 class="font-bold text-lg">{{ $dept->name }}</h4>
                <p class="text-gray-600">{{ Str::limit($dept->description, 100) }}</p>
                <a href="#" class="text-emerald-600 font-semibold hover:underline">Selengkapnya...</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
