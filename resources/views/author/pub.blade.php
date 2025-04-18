<x-admin-layout>
    <div class="bg-transparent grid h-20 place-content-start gap-2">
        <p class="text-2xl font-[1000] mt-5 ml-3">Publish For Repository Research...</p>
    </div>

    <div class="flex flex-wrap gap-4 justify-start ml-5 mr-5 mb-5">
        @forelse ($authors as $author)
            <div class="w-full sm:w-[calc(50%-1rem)] md:w-[calc(33%-1rem)] lg:w-[calc(25%-1rem)] bg-blue-400 text-white rounded-2xl shadow-md p-6">
                <h3 class="text-xl font-semibold text-white"> {{ $author->Title }}</h3>
                <p class="text-white ">by {{ $author->name }}</p>
                <p class="text-white text-sm leading-relaxed">
                    <strong>Abstract:</strong> {{ $author->abstract }}
                </p>
                <div class="border-t border-gray-300 my-4"></div>
                <div class="flex gap-3   ">
                    <a href="{{ route('author.edit', $author->id) }}"
                       class="bg-white text-blue-600 font-medium px-4 py-2 rounded-lg hover:bg-gray-200 transition">
                        {{ __('Edit') }}
                    </a>
                    <a href="{{ route('author.views', $author->id) }}"
                       class="bg-blue-600 text-white font-medium px-4 py-2 rounded-lg hover:bg-blue-200 hover:text-blue-600 transition">
                        {{ __('View') }}
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-600 text-lg ml-5">No Records.....</p>
        @endforelse
    </div>
</x-admin-layout>
