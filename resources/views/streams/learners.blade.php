@extends('layouts.admin')

@section('content')
<<<<<<< HEAD
<div class="container grid px-6 mx-auto">
<div class="flex items-center justify-between mt-5 mr-5">
    <h2 class="ml-5 text-2xl font-semibold dark:text-white">{{ $title }}</h2>
    <div class="flex space-x-4">
        <a href="{{ route('learners.upload') }}" class="px-4 py-2 text-white bg-blue-500 rounded text"> 
            <i class="fas fa-download"></i> Import
        </a>
        <a href="{{ route('learners.create') }}" class="px-4 py-2 mr-4 text-white bg-purple-500 rounded text"> 
            <i class="fas fa-user-edit"></i> Add Learner
        </a>
        <a href="{{ route('streams.export.learners', $stream_id) }}" class="px-4 py-2 text-white bg-green-500 rounded text"> 
            <i class="fas fa-file-excel"></i> Class List
        </a>
    </div>
</div>


<div class="flex items-center justify-between px-10 mt-5">
=======
<div class="container px-6 mx-auto grid">
        <div class="flex justify-between items-center mr-5 mt-5">
        <div class="flex items-center ml-5 mb-4">
            <a href="{{ route('streams.all') }}" class="flex items-center text-blue-500 hover:text-blue-700">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a1 1 0 01-.707-.293l-7-7a1 1 0 010-1.414l7-7a1 1 0 011.414 1.414L4.414 10l6.293 6.293a1 1 0 01-1.414 1.414z" clip-rule="evenodd"></path>
                </svg>
                <span>Back to All Streams</span>
            </a>
            <h2 class="dark:text-white font-semibold text-2xl ml-4">{{ $title }}</h2>
        </div>
        
        <div class="flex space-x-4">
            <a href="{{ route('learners.upload') }}" class="bg-blue-500 text-white px-4 py-2 rounded text"> 
                <i class="fas fa-download"></i> Import
            </a>
            <a href="{{ route('learners.create') }}" class="bg-purple-500 text-white px-4 py-2 rounded text mr-4"> 
                <i class="fas fa-user-edit"></i> Add Learner
            </a>
            <a href="{{ route('streams.export.learners', $stream_id) }}" class="bg-green-500 text-white px-4 py-2 rounded text"> 
                <i class="fas fa-file-excel"></i> Class List
            </a>
        </div>
    </div><br><br>

    <!--stats section using cards-->
    <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Total Learners
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  {{$totalActiveLearners}}
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                >
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M19 10l-4 4 4 4v-3h5v-2h-5v-3z"/>
                  <path d="M5 10l4 4-4 4v-3H0v-2h5v-3z"/>
                </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Inactive Learners
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  {{$totalInactiveLearners}}
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
                >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2a5 5 0 00-5 5 5 5 0 005 5 5 5 0 005-5 5 5 0 00-5-5zm0 6a1 1 0 110-2 1 1 0 010 2zm6-2h-2V4h4v4h-2zm1-1V1h-4v2h1v3h2V3h1zm-6 7h-1v3h-1v2h1v3h1v-3h1v-2h-1v-3zm-6-2h2v2H6v-2zM3 8V6h4v2H5v1H3V8zm1-6v4H2V1h2zm3 3H4V2h2v2z"/>
                </svg>


                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Male
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    {{$totalMaleLearners}}
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
                >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0C8.134 0 5 3.134 5 7s3.134 7 7 7 7-3.134 7-7-3.134-7-7-7zm0 12C9.239 12 7 9.761 7 7s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5zm1 3h-2v2h2v-2zm0 3h-2v2h2v-2z"/>
                </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Female
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    {{$totalFemaleLearners}}
                  </p>
                </div>
              </div>
            </div>
    <!--End of stats section using cards-->


    <div class="flex justify-between items-center mt-5 px-10">
>>>>>>> d0a5f1af59ffdd4770c26f955052672a21bd8f3c
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
                        <td class="px-4 py-3 text-sm">{{ $learner->assessment_no }}</td>
                        <td class="px-4 py-3 text-sm">{{ $learner->name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $learner->admission_no }}</td>
                        <td class="px-4 py-3 text-sm">{{ $learner->gender }}</td>
                        <td class="px-4 py-3 text-sm">{{ $learner->dob }}</td>
                        <td class="px-4 py-3 text-sm">{{ $learner->bc_pp_entry_no }}</td>
                        <td class="px-4 py-3 text-sm">{{ $learner->nationality }}</td>
                        <td class="px-4 py-3 text-sm">{{ $learner->nemis_code }}</td>
                        <td class="px-4 py-3 text-sm">{{ $learner->date_of_addmission }}</td>
                        <td class="px-4 py-3 text-sm">{{ $learner->contact }}</td>
                        <td class="px-4 py-3 text-xs">
                            @if ($learner->status == 'active')
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                Active
                            </span>
                            @elseif($learner->status == 'transferred')
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                Transferred
                            </span>
                            @else
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                Inactive
                            </span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{ route('learners.edit', $learner->id) }}" class="p-2 pr-3 bg-transparent cursor-pointer hover:bg-purple-600 hover:text-white dark:bg-gray-700 dark:hover:bg-purple-600 dark:text-gray-300 dark:hover:text-white">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <button data-id="{{ $learner->id }}" class="p-2 bg-transparent cursor-pointer deleteBtn hover:bg-red-500 hover:text-white dark:bg-gray-700 dark:hover:bg-red-500 dark:text-gray-300 dark:hover:text-white">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-2 mt-2">
            {{ $learners->appends(['per_page' => request('per_page'), 'status' => request('status')])->links() }}
        </div>
    </div>
</div>


<!-- Delete modal -->
<div id="deleteModal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
    <div class="w-1/3 p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold dark:text-white">Confirm Delete</h3>
            <button id="closeModal" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                <i class="fa-solid fa-times"></i>
            </button>
        </div>

        <div class="flex items-center mt-4">
            <i class="mr-3 text-2xl text-red-600 fa-solid fa-exclamation-triangle"></i>
            <p class="dark:text-gray-300">Are you sure you want to delete this learner?</p>
        </div>
        <div class="flex justify-end mt-4">
            <button id="cancelBtn" class="px-4 py-2 mr-2 text-white bg-gray-500 rounded">Cancel</button>
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded">Delete</button>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    document.getElementById('selectAll').addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('.selectItem');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    });

    document.querySelectorAll('.deleteBtn').forEach(button => {
        button.addEventListener('click', function() {
            const modal = document.getElementById('deleteModal');
            modal.querySelector('form').action = `/learners/${this.dataset.id}`;
            modal.classList.remove('hidden');
        });
    });

    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('deleteModal').classList.add('hidden');
    });

    document.getElementById('cancelBtn').addEventListener('click', function() {
        document.getElementById('deleteModal').classList.add('hidden');
    });
</script>

@endsection
