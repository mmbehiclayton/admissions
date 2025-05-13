@extends('layouts.admin')

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Edit Bus
    </h2>

    <form action="{{ route('buses.update', $bus->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="px-6 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold mb-4 text-gray-700 dark:text-gray-300">Bus Details</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Number Plate --}}
                <div>
                    <label for="number_plate" class="block text-sm text-gray-700 dark:text-gray-400">Number Plate</label>
                    <input id="number_plate" name="number_plate" value="{{ old('number_plate', $bus->number_plate) }}"
                        placeholder="e.g. KDA 123A" required
                        class="block w-full mt-1 form-input" />
                    @error('number_plate')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Driver --}}
                <div>
                    <label for="driver" class="block text-sm text-gray-700 dark:text-gray-400">Driver</label>
                    <input id="driver" name="driver" value="{{ old('driver', $bus->driver) }}"
                        placeholder="Driver Name" required
                        class="block w-full mt-1 form-input" />
                    @error('driver')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Assistant --}}
                <div>
                    <label for="assistant" class="block text-sm text-gray-700 dark:text-gray-400">Assistant</label>
                    <input id="assistant" name="assistant" value="{{ old('assistant', $bus->assistant) }}"
                        placeholder="Assistant Name" required
                        class="block w-full mt-1 form-input" />
                    @error('assistant')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Route --}}
                <div>
                    <label for="route" class="block text-sm text-gray-700 dark:text-gray-400">Route</label>
                    <input id="route" name="route" value="{{ old('route', $bus->route) }}"
                        placeholder="e.g. South C - Madaraka - Upperhill" required
                        class="block w-full mt-1 form-input" />
                    @error('route')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Capacity --}}
                <div>
                    <label for="capacity" class="block text-sm text-gray-700 dark:text-gray-400">Capacity</label>
                    <input id="capacity" name="capacity" type="number" min="1"
                        value="{{ old('capacity', $bus->capacity) }}" placeholder="e.g. 60" required
                        class="block w-full mt-1 form-input" />
                    @error('capacity')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Owner --}}
                <div>
                    <label for="owner" class="block text-sm text-gray-700 dark:text-gray-400">Owner</label>
                    <input id="owner" name="owner" value="{{ old('owner', $bus->owner) }}"
                        placeholder="Owner Name" required
                        class="block w-full mt-1 form-input" />
                    @error('owner')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Contact --}}
                <div>
                    <label for="contact" class="block text-sm text-gray-700 dark:text-gray-400">Contact</label>
                    <input id="contact" name="contact" value="{{ old('contact', $bus->contact) }}"
                        placeholder="e.g. +254712345678" required
                        class="block w-full mt-1 form-input" />
                    @error('contact')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Type --}}
                <div>
                    <label for="type" class="block text-sm text-gray-700 dark:text-gray-400">Bus Type</label>
                    <select id="type" name="type" required
                        class="block w-full mt-1 form-select">
                        <option value="">-- Select Type --</option>
                        <option value="Private" {{ old('type', $bus->type) == 'Private' ? 'selected' : '' }}>Private</option>
                        <option value="Public" {{ old('type', $bus->type) == 'Public' ? 'selected' : '' }}>Public</option>

                    </select>
                    @error('type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="flex flex-col sm:flex-row gap-4 mt-6">
                <a href="{{ route('buses.index') }}"
                    class="p-2 w-full sm:w-56 bg-gray-300 text-gray-800 hover:bg-gray-400 text-center transition duration-150 ease-in-out rounded">
                    Cancel
                </a>
                <button type="submit"
                    class="p-2 w-full sm:w-56 bg-purple-600 text-white hover:bg-purple-700 transition duration-150 ease-in-out rounded">
                    Update Bus
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
