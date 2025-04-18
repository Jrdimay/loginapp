<title>Schedule</title>

<x-admin-layout>
    <div class="bg-transparent grid h-5 grid-cols-2 place-content-start gap-2">
        <p class="text-2xl font-[1000] mt-5 ml-3">Schedule of Research Defense</p>
    </div>

    <div class="bg-gray-100 overflow-x-auto mt-20 relative p-10">

        <!-- Table container -->
        <table class="  mx-auto bg-gray-100 rounded-xl shadow-md relative">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-10 py-3 text-left text-sm font-semibold uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Author</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Date of schedule</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Edit</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Delete</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-500">
                @forelse($appointments as $appointment)
                    <tr class="hover:bg-blue-50">
                        <td class="px-10 py-4 text-sm">{{ $appointment->title }}</td>
                        <td class="px-6 py-4 text-sm">
                            {{ $appointment->author1 }}
                            {{ $appointment->author2 ? ', ' . $appointment->author2 : '' }}
                            {{ $appointment->author3 ? ', ' . $appointment->author3 : '' }}
                            {{ $appointment->author4 ? ', ' . $appointment->author4 : '' }}
                            {{ $appointment->author5 ? ', ' . $appointment->author5 : '' }}
                        </td>
                        <td class="px-3 py-4 text-sm">{{ \Carbon\Carbon::parse($appointment->date_of_appointment)->format('F d, Y') }}</td>
                        <td class="px-3 py-4 text-sm">
                            <a href="{{ route('appointments.edit', $appointment->id) }}"
                               class="bg-blue-400 text-white px-6 py-3.5 rounded-lg hover:bg-blue-600 transition">
                                {{ __('Edit') }}
                            </a>
                        </td>
                        <td class="px-3 py-4 text-sm">
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 text-white px-3 py-3 rounded-lg mt-3 hover:bg-red-700 transition">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">No appointments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-admin-layout>
