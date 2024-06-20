@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mr-5 mt-5">
    <h2 class="dark:text-white ml-5 font-semibold text-2xl">{{ $title }}</h2>
</div>
<section class="px-4">
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-3 text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <div class="flex justify-between items-center px-4 py-3">
                            <span>Permission</span>
                            
                            <span> <input type="checkbox" id="select-all" class="form-checkbox h-5 w-5 text-purple-600 transition duration-150 ease-in-out dark:bg-gray-700 dark:border-gray-600"><strong class="m-3">Select All</strong></span>
                        </div>
                    </div>
                    @foreach ($permissions as $permission)
                    <div class="text-gray-700 dark:text-gray-400 bg-white dark:bg-gray-800 p-4 border dark:border-gray-700">
                        <label class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                            @if(in_array($permission->id, $rolePermissions)) checked @endif
                            class="form-checkbox h-5 w-5 text-purple-600 transition duration-150 ease-in-out dark:bg-gray-700 dark:border-gray-600">
                            <span class="ml-2">{{ $permission->name }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mt-4 mb-4">
            <button type="submit" class="bg-purple-500 text-white px-4 py-2 rounded">Update Permissions</button>
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
