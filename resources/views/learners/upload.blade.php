@extends('layouts.admin')
@section('content')

<div class="flex justify-between items-center mr-5 mt-5">
    <h2 class="dark:text-white ml-5 font-semibold text-2xl">Bulk Upload Learners</h2>
</div>

<section class="px-10 mt-6">
    <div class="w-full overflow-hidden rounded-lg shadow-xs p-6 bg-white dark:bg-gray-800">
        <form action="{{ route('learners.bulkUpload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Choose a CSV file</label>
                <input type="file" name="file" id="file" class="mt-2 p-2 border border-gray-300 rounded-md w-full dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Upload</button>
            </div>
        </form>
    </div>
</section>

@endsection
