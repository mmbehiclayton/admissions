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
                        <td class="px-4 py-3">
                            <div class="flex space-x-2">
                                <a href="{{ route('buses.edit', $bus->id) }}"
                                    class="px-2 py-1 text-xs font-semibold text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                    Edit
                                </a>
                                <form action="{{ route('buses.destroy', $bus->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this bus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-2 py-1 text-xs font-semibold text-white bg-red-600 rounded hover:bg-red-700">
                                        Delete
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
