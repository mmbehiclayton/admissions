@extends('layouts.admin')

@section('content')

<div class="flex items-center justify-between mt-5 mr-5">
    <h2 class="ml-5 text-2xl font-semibold dark:text-white">{{ $title }}</h2>
</div>
<section class="px-4">
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="grid grid-cols-3 gap-4 px-3 pt-3">


                    <div class="flex items-center justify-between px-4 py-3">

                        <span>Branch</span>

                        <span> <select name="roles" id="select" class="block w-full text-sm border-r-2 border-gray-950 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="">Current Branch [ "{{$userBranch}}" ]</option>
                                @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}" {{ $branch->id == '' ? 'selected' : '' }}>
                                    {{ $branch->name }}
                                </option>
                                @endforeach
                            </select></span>
                    </div>
                    <div class="flex items-center justify-between px-4 py-3">

                        <span>Role</span>

                        <span> <select name="roles" id="select" class="block w-full text-sm border-r-2 border-gray-950 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="">Current Role {{$userRole}}</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->name }}" {{ $role->id == '' ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                                @endforeach
                            </select></span>
                    </div>
                    <div class="flex items-center justify-between px-4 py-3">

                        <span>User Name</span>

                        <span> <input type="text" class="block w-full text-sm border-r-2 border-gray-950 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="name" value="{{$user->name}}"></span>
                    </div>
                   
                    <div class="flex items-center justify-between px-4 py-3">

                        <span>User Email</span>

                        <span> <input type="email" class="block w-full text-sm border-r-2 border-gray-950 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="email" value="{{$user->email}}"></span>
                    </div>
                   


                    <div class="col-span-3 text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <div class="flex items-center justify-between px-4 py-3">

                            <span>Permission</span>

                            <span> <input type="checkbox" id="select-all" class="w-5 h-5 text-purple-600 transition duration-150 ease-in-out form-checkbox dark:bg-gray-700 dark:border-gray-600"><strong class="m-3">Select All</strong></span>
                        </div>
                    </div>

                    <div>

                    </div>
                    @foreach ($permissions as $permission)
                    <div class="p-4 text-gray-700 bg-white border dark:text-gray-400 dark:bg-gray-800 dark:border-gray-700">
                        <label class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ in_array($permission->name, $userPermissions) ? 'checked' : '' }} class="w-5 h-5 text-purple-600 transition duration-150 ease-in-out form-checkbox dark:bg-gray-700 dark:border-gray-600">
                            <span class="ml-2">{{ $permission->name }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mt-4 mb-4">
            <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded">Update User</button>
        </div>
    </form>
</section>

<script>
    document.getElementById('select-all').onclick = function() {
        var checkboxes = document.querySelectorAll('input[name="permissions[]"]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }
</script>

@endsection