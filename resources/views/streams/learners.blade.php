@extends('layouts.admin')
@section('content')

<div class="flex justify-between items-center mr-5 mt-5">
    <h2 class="dark:text-white ml-5 font-semibold text-2xl">{{$title}}</h2>
    <div class="flex space-x-4">
        <a href="{{route('learners.upload')}}" class="bg-blue-500 text-white px-4 py-2 rounded text"> <i class="fas fa-download"></i> Import</a>
        <a href="{{route('learners.create')}}" class="bg-purple-500 text-white px-4 py-2 rounded text mr-4"> <i class="fas fa-user-edit"></i> Add Learner</a>
    </div>
</div>

<div class="flex justify-between items-center mt-5 px-10">
    <form method="GET" action="{{ route('streams.learners', $stream->id) }}" class="flex items-center space-x-4">
        <div class="flex items-center">
            <label for="per_page" class="mr-2 text-gray-700 dark:text-gray-300">Show</label>
            <select name="per_page" id="per_page" class="form-select" onchange="this.form.submit()">
                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                <option value="75" {{ request('per_page') == 75 ? 'selected' : '' }}>75</option>
                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
            </select>
            <span class="ml-2 text-gray-700 dark:text-gray-300">records</span>
        </div>
        
        <div class="flex items-center">
            <label for="status" class="mr-2 text-gray-700 dark:text-gray-300">Status</label>
            <select name="status" id="status" class="form-select" onchange="this.form.submit()">
                <option value="">All</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="transferred" {{ request('status') == 'transferred' ? 'selected' : '' }}>Transferred</option>
                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </form>
</div>

<section class="px-10 mt-5">
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"></h4>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table id="table1" class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3"><input type="checkbox" id="selectAll"></th>
                        <th class="px-4 py-3">No.</th>
                        <th class="px-4 py-3">Assessment No</th>
                        <th class="px-4 py-3">Full Name</th>
                        <th class="px-4 py-3">Adm No</th>
                        <th class="px-4 py-3">Gender</th>
                        <th class="px-4 py-3">DOB</th>
                        <th class="px-4 py-3">B/C No</th>
                        <th class="px-4 py-3">Nationality</th>
                        <th class="px-4 py-3">Nemis</th>
                        <th class="px-4 py-3">DOA</th>
                        <th class="px-4 py-3">Contact</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($learners as $index => $learner)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3"><input type="checkbox" class="selectItem" value="{{ $learner->id }}"></td>
                        <td class="px-4 py-3 text-sm">{{ ($learners->currentPage() - 1) * $learners->perPage() + $index + 1 }}</td>
                        <td class="px-4 py-3 text-sm">{{$learner->assessment_no}}</td>
                        <td class="px-4 py-3 text-sm">{{$learner->name}}</td>
                        <td class="px-4 py-3 text-sm">{{$learner->admission_no}}</td>
                        <td class="px-4 py-3 text-sm">{{$learner->gender}}</td>
                        <td class="px-4 py-3 text-sm">{{$learner->dob}}</td>
                        <td class="px-4 py-3 text-sm">{{$learner->bc_pp_entry_no}}</td>
                        <td class="px-4 py-3 text-sm">{{$learner->nationality}}</td>
                        <td class="px-4 py-3 text-sm">{{$learner->nemis_code}}</td>
                        <td class="px-4 py-3 text-sm">{{$learner->date_of_addmission}}</td>
                        <td class="px-4 py-3 text-sm">{{$learner->contact}}</td>
                        @if ($learner->status == 'active')
                        <td class="px-4 py-3 text-sm"><span class="bg-green-700 h-3 text-white p-1 pl-3 pr-3">Active</span></td>
                        @elseif($learner->status == 'transferred')
                        <td class="px-4 py-3 text-sm"><span class="bg-gray-400 h-3 text-black p-1 pl-3 pr-3">Transferred</span></td>
                        @else
                        <td class="px-4 py-3 text-sm"><span class="bg-red-700 h-3 text-white p-1 pl-3 pr-3">Inactive</span></td>
                        @endif
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <div class="col-sm">
                                    <a href="{{ route('learners.edit', $learner->id) }}" class="p-2 pr-3 bg-transparent hover:bg-purple-600 hover:text-white cursor-pointer dark:bg-gray-700 dark:hover:bg-purple-600 dark:text-gray-300 dark:hover:text-white">
                                        <i class="fa fa-edit mx-1"></i>Edit
                                    </a>
                                </div>
                                <div class="col-sm">
                                    <button data-id="{{ $learner->id }}" class="deleteBtn p-2 bg-transparent hover:bg-red-500 hover:text-white cursor-pointer dark:bg-gray-700 dark:hover:bg-red-500 dark:text-gray-300 dark:hover:text-white">
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
                                    <p class="dark:text-gray-300">Are you sure you want to delete this learner?</p>
                                </div>
                                <div class="mt-4 flex justify-end">
                                    <button id="cancelBtn" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                                    <form id="deleteForm" method="POST" action="{{route('learners.destroy', $learner->id)}}">
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
            {{$learners->appends(['per_page' => request('per_page'), 'status' => request('status')])->links()}}
        </div>
    </div>
</section>

<script>
    document.getElementById('selectAll').addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('.selectItem');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    });
</script>

@endsection
