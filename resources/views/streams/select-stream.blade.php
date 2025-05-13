@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded">
    <h2 class="text-2xl font-bold mb-6">Select Stream</h2>

    <div>
        <label for="stream" class="block text-sm font-medium text-gray-700">Select Stream</label>
        <select id="stream" name="stream_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-500">
            <option value="">-- Select Stream --</option>
        </select>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetchStreams();

        function fetchStreams() {
            fetch("{{ route('streams.byBranch') }}")
                .then(response => response.json())
                .then(data => {
                    const streamSelect = document.getElementById('stream');
                    streamSelect.innerHTML = '<option value="">-- Select Stream --</option>';

                    data.forEach(stream => {
                        const option = document.createElement('option');
                        option.value = stream.id;
                        option.text = stream.class_name + ' - ' + stream.name;
                        streamSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching streams:', error);
                });
        }
    });
</script>
@endsection
