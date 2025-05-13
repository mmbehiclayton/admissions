@extends('layouts.admin')

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        School Buses
    </h2>

    <div class="mb-4">
        <a href="{{ route('buses.create') }}"
            class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition duration-150">
            + Register New Bus
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Number Plate</th>
                    <th class="px-4 py-3">Driver</th>
                    <th class="px-4 py-3">Assistant</th>
                    <th class="px-4 py-3">Route</th>
                    <th class="px-4 py-3">Capacity</th>
                    <th class="px-4 py-3">Owner</th>
                    <th class="px-4 py-3">Contact</th>
                    <th class="px-4 py-3">Type</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($buses as $index => $bus)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 text-sm">{{ $bus->number_plate }}</td>
                        <td class="px-4 py-3 text-sm">{{ $bus->driver }}</td>
                        <td class="px-4 py-3 text-sm">{{ $bus->assistant }}</td>
                        <td class="px-4 py-3 text-sm">{{ $bus->route }}</td>
                        <td class="px-4 py-3 text-sm">{{ $bus->capacity }}</td>
                        <td class="px-4 py-3 text-sm">{{ $bus->owner }}</td>
                        <td class="px-4 py-3 text-sm">{{ $bus->contact }}</td>
                        <td class="px-4 py-3 text-sm">{{ $bus->type }}</td>

                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('buses.edit', $bus->id) }}" title="Edit"
                                    class="p-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828L13.586 3.586zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                    </svg>
                                </a>

                                <form action="{{ route('buses.destroy', $bus->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this bus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete"
                                        class="p-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-3 text-center text-sm text-gray-500 dark:text-gray-400">
                            No buses found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
