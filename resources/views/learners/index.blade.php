@extends('layouts.admin')
@section('content')
<div class="container px-6 mx-auto grid">
    <div class="flex justify-between items-center mr-5 mt-5 flex-wrap gap-4">
        <h2 class="dark:text-white ml-5 font-semibold text-2xl">{{ $title }}</h2>

        <div class="flex flex-wrap gap-2 justify-end items-center max-w-full mt-4 md:mt-0">
            <a href="{{ route('learners.upload') }}" class="bg-green-500 text-white px-4 py-2 rounded text whitespace-nowrap">
                <i class="fas fa-upload mr-1"></i> Add Bulk Learners
            </a>
            <a href="{{ route('learners.export') }}" class="bg-green-500 text-white px-4 py-2 rounded text whitespace-nowrap">
                <i class="fas fa-file-excel mr-1"></i> Nemis List
            </a>
            <a href="{{ route('learners.create') }}" class="bg-green-500 text-white px-4 py-2 rounded text whitespace-nowrap">
                <i class="fas fa-user-edit mr-1"></i> Add Learner
            </a>
        </div></div>

    </div><br><br>

    <!-- Bulk Delete Form -->
    <form id="bulkDeleteForm" method="POST" action="{{ route('learners.bulkDelete') }}">
        @csrf
        @method('DELETE')
        <div class="mb-4">
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded" onclick="return confirm('Delete selected learners?')">
                Delete Selected
            </button>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table id="table1" class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3"><input type="checkbox" id="selectAll" class="form-checkbox"></th>
                            <th class="px-4 py-3">No.</th>
                            <th class="px-4 py-3">Class</th>
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
                            <td class="px-4 py-3 text-sm">
                                <input type="checkbox" name="selected_ids[]" value="{{ $learner->id }}" class="form-checkbox selectRow">
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 text-sm">{{ $learner->streams->classes->name }} {{ $learner->streams->name }}</td>
                            <td class="px-4 py-3 text-sm">
                                @if ($learner->assessment_no === 'None' || $learner->assessment_no === 'EQUATION')
                                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                        {{ $learner->assessment_no }}
                                    </span>
                                @else
                                    {{ $learner->assessment_no }}
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">{{ ucwords(strtolower($learner->name)) }}</td>
                            <td class="px-4 py-3 text-sm">{{ $learner->admission_no }}</td>
                            <td class="px-4 py-3 text-sm">{{ $learner->gender }}</td>
                            <td class="px-4 py-3 text-sm">{{ $learner->dob }}</td>
                            <td class="px-4 py-3 text-sm">{{ $learner->bc_pp_entry_no }}</td>
                            <td class="px-4 py-3 text-sm">{{ ucwords(strtolower($learner->nationality)) }}</td>
                            <td class="px-4 py-3 text-sm">{{ $learner->nemis_code }}</td>
                            <td class="px-4 py-3 text-sm">{{ $learner->date_of_addmission }}</td>
                            <td class="px-4 py-3 text-sm">{{ $learner->contact }}</td>
                            <td class="px-4 py-3 text-xs">
                                @php
                                    $statusClass = match($learner->status) {
                                        'active' => 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100',
                                        'transferred' => 'text-red-700 bg-red-100 dark:text-red-100 dark:bg-red-700',
                                        default => 'text-red-700 bg-red-100 dark:text-red-100 dark:bg-red-700',
                                    };
                                @endphp
                                <span class="px-2 py-1 font-semibold leading-tight rounded-full {{ $statusClass }}">
                                    {{ ucfirst($learner->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{ route('learners.edit', $learner->id) }}" class="p-2 pr-3 bg-transparent hover:bg-green-600 hover:text-white cursor-pointer dark:bg-gray-700 dark:hover:bg-green-600 dark:text-gray-300 dark:hover:text-white">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M13.586 3.586a2 2 0 112.828 2.828L13.586 3.586zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                    </a>
                                    <button data-id="{{ $learner->id }}" class="deleteBtn p-2 bg-transparent hover:bg-red-500 hover:text-white cursor-pointer dark:bg-gray-700 dark:hover:bg-red-500 dark:text-gray-300 dark:hover:text-white">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-2 p-2">
                {{ $learners->links() }}
            </div>
        </div>
    </form>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md">
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
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Delete</button>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const selectAllCheckbox = document.getElementById('selectAll');
    const rowCheckboxes = document.querySelectorAll('.selectRow');
    const deleteModal = document.getElementById('deleteModal');
    const closeModal = document.getElementById('closeModal');
    const cancelBtn = document.getElementById('cancelBtn');
    const deleteForm = document.getElementById('deleteForm');
    const deleteButtons = document.querySelectorAll('.deleteBtn');

    // Select all checkboxes
    selectAllCheckbox.addEventListener('change', function () {
        rowCheckboxes.forEach(cb => cb.checked = this.checked);
    });

    // Delete modal for single delete
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const learnerId = this.getAttribute('data-id');
            deleteForm.setAttribute('action', `/learners/${learnerId}`);
            deleteModal.classList.remove('hidden');
        });
    });

    closeModal.addEventListener('click', () => deleteModal.classList.add('hidden'));
    cancelBtn.addEventListener('click', () => deleteModal.classList.add('hidden'));
});
</script>
@endsection
