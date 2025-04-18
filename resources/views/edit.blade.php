<x-admin-layout>
    <div class="max-w-xl mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-4">Edit Appointment</h1>

        <form method="POST" action="{{ route('appointments.update', $appointment->id) }}">
            @csrf
            @method('PUT')

            <input type="text" name="title" value="{{ old('title', $appointment->title) }}" required class="w-full mb-3 p-2 border rounded" placeholder="Title" />

            @for ($i = 1; $i <= 5; $i++)
                <input type="text" name="author{{ $i }}" value="{{ old("author$i", $appointment["author$i"]) }}"
                       class="w-full mb-3 p-2 border rounded" placeholder="Author {{ $i }}" {{ $i === 1 ? 'required' : '' }} />
            @endfor

            <input type="date" name="date_of_appointment" value="{{ old('date_of_appointment', $appointment->date_of_appointment) }}" required class="w-full mb-3 p-2 border rounded" />

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800">Update</button>
        </form>
    </div>
</x-admin-layout>
