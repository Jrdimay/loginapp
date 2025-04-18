<x-admin-layout>
    <div class="flex justify-center items-center mt-10 bg-gray-100 ">
        <form method="POST" action="{{ route('appointments.store') }}" class="bg-white p-3 rounded-lg m-6 shadow-lg max-w-md">
            @csrf
            <h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Create Appointment</h2>

            <input type="text" name="title" placeholder="Title" required
                class="w-full p-2 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />

            @for ($i = 1; $i <= 5; $i++)
                <input type="text" name="author{{ $i }}" placeholder="Author {{ $i }}" 
                    class="w-full p-2 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    {{ $i === 5 ? 'required' : '' }} />
            @endfor

            <input type="date" name="date_of_appointment" required
                class="w-full p-3 mb-6 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />

            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                Submit
            </button>
        </form>
    </div>
    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</x-admin-layout>


