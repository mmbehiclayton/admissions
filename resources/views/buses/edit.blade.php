@extends('layouts.admin')

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Edit Bus
    </h2>

    <form action="{{ route('buses.update', $bus->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 grid grid-cols-1 md:grid-cols-2 gap-4">

            {{-- Number Plate --}}
            <div class="my-1">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Number Plate</span>
                    <input name="number_plate" value="{{ old('number_plate', $bus->number_plate) }}" placeholder="e.g. KDA 123A"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('number_plate')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            {{-- Driver --}}
            <div class="my-1">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Driver</span>
                    <input name="driver" value="{{ old('driver', $bus->driver) }}" placeholder="Driver Name"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('driver')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            {{-- Assistant --}}
            <div class="my-1">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Assistant</span>
                    <input name="assistant" value="{{ old('assistant', $bus->assistant) }}" placeholder="Assistant Name"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('assistant')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            {{-- Route --}}
            <div class="my-1">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Route</span>
                    <input name="route" value="{{ old('route', $bus->route) }}" placeholder="e.g. South C - Madaraka - Upperhill"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('route')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            {{-- Capacity --}}
            <div class="my-1">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Capacity</span>
                    <input name="capacity" type="number" value="{{ old('capacity', $bus->capacity) }}" placeholder="e.g. 60"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('capacity')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="flex gap-2">
            <a href="{{ route('buses.index') }}"
                class="p-2 w-56 bg-gray-300 text-gray-800 hover:bg-gray-400 transition duration-150 ease-in-out text-center">
                Cancel
            </a>
            <button type="submit"
                class="p-2 bg-purple-600 w-56 text-white hover:bg-purple-700 transition duration-150 ease-in-out">
                Update Bus
            </button>
        </div>
    </form>
</div>
@endsection
