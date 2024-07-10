@extends('layouts.admin')
@section('content')

<div class="flex justify-between items-center mr-5 mt-5">
    <h2 class="dark:text-white ml-5 font-semibold text-2xl">{{$title}}</h2>
    <a href="{{route('classes.create')}}" class="bg-purple-500 text-white px-4 py-2 rounded text"> <i class="fas fa-user-edit"></i> Add class</a>
</div>
<section class="px-4">
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"></h4>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Branch</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($classes as $class )

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">{{$class->name}}</td>
                        <td class="px-4 py-3 text-sm">{{ $class->branches ? $class->branches->name : 'No Branch' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <div class="col-sm">
                                    <a href="{{ route('classes.edit', $class->id) }}" class=" p-2 pr-3 bg-transparent hover:bg-purple-600 hover:text-white cursor-pointer dark:bg-gray-700 dark:hover:bg-purple-600 dark:text-gray-300 dark:hover:text-white"> 
                                        <i class="fa fa-edit mx-1"></i>Edit
                                    </a>
                                </div>
                                <div class="col-sm">
                                    <button data-id="{{ $class->id }}" class="deleteBtn  p-2 bg-transparent hover:bg-red-500 hover:text-white cursor-pointer dark:bg-gray-700 dark:hover:bg-red-500 dark:text-gray-300 dark:hover:text-white">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </td>

                        <!-- Delete modal -->
                        <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-1/3">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-semibold dark:text-white">Confirm Delete</h3>
                                    <button id="closeModal" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                                        <i class="fa-solid fa-times"></i>
                                    </button>
                                </div>
                                <div class="mt-4 flex items-center">
                                    <i class="fa-solid fa-exclamation-triangle text-red-600 text-2xl mr-3"></i>
                                    <p class="dark:text-gray-300">Are you sure you want to delete this class?</p>
                                </div>
                                <div class="mt-4 flex justify-end">
                                    <button id="cancelBtn" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                                    <form id="deleteForm" method="POST" action="{{route('classes.destroy', $class->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-2 p-2">
            {{$classes->links()}}
        </div>
    </div>
</section>


@endsection
