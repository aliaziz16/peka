<section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto text-center space-y-8 px-8">
        <h1 class="text-4xl font-bold">Jajaran Ketua dari Periode ke Periode</h1>

        <div class="space-y-4">
            <h4 class="text-emerald-600 font-semibold text-2xl">IPNU</h4>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-4">
                @foreach($ipnu as $leader)
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center space-y-2">
                        <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-emerald-600">
                            <img src="{{ asset('storage/' . $leader->photo) }}" class="object-cover w-full h-full">
                        </div>
                        <h5 class="font-semibold text-lg">{{ $leader->name }}</h5>
                        <p class="text-gray-500 text-sm">{{ $leader->period }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="space-y-4">
            <h4 class="text-emerald-600 font-semibold text-2xl">IPPNU</h4>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-4">
                @foreach($ippnu as $leader)
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center space-y-2">
                        <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-emerald-600">
                            <img src="{{ asset('storage/' . $leader->photo) }}" class="object-cover w-full h-full">
                        </div>
                        <h5 class="font-semibold text-lg">{{ $leader->name }}</h5>
                        <p class="text-gray-500 text-sm">{{ $leader->period }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
