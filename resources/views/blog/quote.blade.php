<section class="py-16 bg-gray-200">
    <div class="max-w-5xl mx-auto text-center px-4">
        <h4 class="text-emerald-600 font-semibold mb-2">Quote</h4>
        <h1 class="text-4xl font-bold mb-10">Kata - kata Hari Ini!</h1>

        <div class="bg-white shadow rounded-lg p-8 mx-4 space-y-4">
            <p class="text-gray-700 italic">“{{ $quote->content }}”</p>
            <div class="flex flex-col items-center">
                <img src="http://placehold.it/72x72" class="rounded-full mb-2" alt="Reviewer">
                <span class="font-bold">{{ $quote->author ?? 'Anonymous' }}</span>
            </div>
        </div>
    </div>
</section>
