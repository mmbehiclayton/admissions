@extends('layouts.admin')
@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{$title}}
    </h2>
    <form action="{{route('classes.store')}}" method="post">
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 grid grid-cols-1 md:grid-cols-2 gap-2 ">
           
        <div class="my-1">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                         Branch
                    </span>
                    <select name="branch_id" id="select" class="block w-full text-sm border-r-2 border-gray-950 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        @foreach ($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                        @endforeach
                    </select>
                </label>
                @error('branch_id')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input name="name" placeholder="E,g Class green" value="{{old('name')}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('name')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <button class="p-2 bg-purple-600 ml-1 w-56 text-white hover:bg-purple-700 type=" submit">Submit</button>

    </form>
</div>
@endsection