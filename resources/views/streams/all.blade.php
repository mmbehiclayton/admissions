@extends('layouts.admin')
@section('content')

<div class="flex justify-between items-center mr-5 mt-5">
    <h2 class="dark:text-white ml-5 font-semibold text-2xl">{{ $title }}</h2>
</div>

<section class="px-4">
    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-6">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Stream</th>
                        <th class="px-4 py-3">Total Learners</th>
                        <th class="px-4 py-3">Active</th>
                        <th class="px-4 py-3">Boys</th>
                        <th class="px-4 py-3">Girls</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($streams as $stream)
                    @php
                        $total = $stream->learners->count();
                        $active = $stream->learners->where('status', 'active')->count();
                        $male = $stream->learners->where('status', 'active')->where('gender', 'Male')->count();
                        $female = $stream->learners->where('status', 'active')->where('gender', 'Female')->count();
                    @endphp
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm font-semibold">
                            <a href="{{ route('streams.learners', $stream->id) }}" class="text-blue-500 hover:underline">
                                {{ optional($stream->classes->branches)->name }} - {{ optional($stream->classes)->name }} {{ $stream->name }}
                            </a>
                        </td>
                        <td class="px-4 py-3 text-sm">{{ $total }}</td>
                        <td class="px-4 py-3 text-sm text-green-600">{{ $active }}</td>
                        <td class="px-4 py-3 text-sm">{{ $male }}</td>
                        <td class="px-4 py-3 text-sm">{{ $female }}</td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('streams.learners', $stream->id) }}" class="text-sm text-blue-600 hover:underline">View Learners</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
