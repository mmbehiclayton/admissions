<x-app-layout>
<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-8 lg:px-10">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-semibold">{{ __('Learners') }}</h1>
                <a href="{{ route('learners.create') }}" class="text-indigo-600">{{ __('Add New Learner') }}</a>
                <table class="min-w-full divide-y divide-gray-200 mt-4">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Name') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Admission Number') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Gender') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('DOB') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('BCN') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Nationality') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('NEMIS Code') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('DOA') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Phone Number') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Stream') }}</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($learners as $learner)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $learner->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $learner->adm_no }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $learner->gender }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $learner->dob }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $learner->birth_cert_no }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $learner->nationality }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $learner->nemis_code }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $learner->doa }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $learner->contact }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $learner->stream->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $learner->status }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
