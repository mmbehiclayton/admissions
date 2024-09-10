@extends('layouts.admin')
@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{$title}}
    </h2>
    <form action="{{route('roles.store')}}" method="post">
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 grid grid-cols-1  ">

            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">User Name</span>
                    <input name="name" placeholder="E,g Clayton Hamisi" value="{{old('name')}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('name')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Email</span>
<<<<<<< HEAD
                    <input name="name" placeholder="e.g. clayton@gmail.com" value="{{old('email')}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
=======
                    <input name="name" placeholder="E,g Class green" value="{{old('email')}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
>>>>>>> 3695be3cd522d08aa94ac83a183608546794e6b0
                </label>
                @error('name')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-1">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Role
                    </span>
                    <select name="roles_id" id="select" class="block w-full text-sm border-r-2 border-gray-950 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="">- Select role -</option>
                        @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </label>
                @error('roles_id')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-3 text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-green-50 dark:text-gray-400 dark:bg-gray-800">
                        <div class="flex justify-between items-center px-4 py-3">
                            <span>Permission</span>

                            <span> <input type="checkbox" id="select-all" class="form-checkbox h-5 w-5 text-green-600 transition duration-150 ease-in-out dark:bg-gray-700 dark:border-gray-600"><strong class="m-3">Select All</strong></span>
                        </div>
                    </div>

                    @foreach ($permissions as $permission)
                    <div class="text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 p-4 border dark:border-gray-700">
                        <label class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-checkbox h-5 w-5 text-green-600 transition duration-150 ease-in-out dark:bg-gray-700 dark:border-gray-600">
                            <span class="ml-2">{{ $permission->name }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>

            <button class="p-2 bg-green-600 ml-1 w-56 text-white hover:bg-green-700 type=" submit">Submit</button>
        </div>

</div>


</form>
</div>
@endsection