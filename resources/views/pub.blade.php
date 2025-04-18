<x-admin-layout>
    <div class="bg-transparent grid h-20 place-content-start gap-2">
        <p class="text-2xl font-[1000] mt-5 ml-3">Publish For Repository Research...</p>
    </div>
    <form action="{{ route('author.index') }}" method="GET" class="px-5 mb-3">
        <div class="flex items-center gap-2">
            <input type="text" name="search" value="{{ request('search') }}"placeholder="Search by Title..."class="w-full sm:w-1/3 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <button type="submit"class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Search
            </button>
        </div>
    </form>
<div class="bg-gray-100 overflow-x-auto relative p-1">
    <div class="flex flex-wrap gap-4 justify-start m-5">
        @forelse ($authors as $author)
            <div class="flex flex-col justify-between h-[370px] w-full sm:w-[calc(50%-1rem)] md:w-[calc(33%-1rem)] lg:w-[calc(25%-1rem)] bg-blue-400 text-white rounded-2xl shadow-md p-6">
                <h3 class="mt-auto text-xl font-semibold text-white"> {{ $author->Title }}</h3>
                <p class=" mt-auto text-white ">by {{ $author->name }}</p>
                <p class="mt-auto text-white text-sm ">
    <strong>Abstract:</strong> {{ \Illuminate\Support\Str::limit($author->abstract, 100, '...') }}
</p>

   <div class="mt-auto border-t border-gray-300 pt-4">
      <div class="flex gap-5">
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

            </div>
        @empty
            <p class="text-gray-600 text-lg ml-5">No Records.....</p>
        @endforelse
    </div>
    </div>
</x-admin-layout>
