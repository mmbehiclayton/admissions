<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-1">
                    <form method="POST" action="{{ route('learners.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                   class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>

                        <div class="mb-4">
                            <label for="adm_no" class="block text-sm font-medium text-gray-700">{{ __('Admission Number') }}</label>
                            <input type="text" name="adm_no" id="adm_no" value="{{ old('adm_no') }}" required
                                   class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('adm_no')" class="mt-2"/>
                        </div>

                        <div class="mb-4">
                            <label for="gender" class="block text-sm font-medium text-gray-700">{{ __('Gender') }}</label>
                            <select name="gender" id="gender" required
                                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option value="">{{ __('Select Gender') }}</option>
                                <option value="male" {{ old('gender') == 'Male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                                <option value="female" {{ old('gender') == 'Female' ? 'selected' : '' }}>{{ __('Female') }}</option>
                            </select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2"/>
                        </div>

                        <div class="mb-4">
                            <label for="dob" class="block text-sm font-medium text-gray-700">{{ __('Date of Birth') }}</label>
                            <input type="date" name="dob" id="dob" value="{{ old('dob') }}" required
                                   class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <x-input-error :messages="$errors->get('dob')" class="mt-2"/>
                        </div>
                    </div>

                <div class="col-span-1">
                    <div class="mb-4">
                        <label for="birth_cert_no" class="block text-sm font-medium text-gray-700">{{ __('Birth Certificate Number') }}</label>
                        <input type="text" name="birth_cert_no" id="birth_cert_no" value="{{ old('birth_cert_no') }}" required
                               class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <x-input-error :messages="$errors->get('birth_cert_no')" class="mt-2"/>
                    </div>

                    <div class="mb-4">
                        <label for="nationality" class="block text-sm font-medium text-gray-700">{{ __('Nationality') }}</label>
                        <select name="nationality" id="nationality" required
                                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="">{{ __('Select Nationality') }}</option>
                            <option value="citizen" {{ old('nationality') == 'citizen' ? 'selected' : '' }}>Citizen</option>
                            <option value="non-citizen" {{ old('nationality') == 'non-citizen' ? 'selected' : '' }}>Non-Citizen</option>
                        </select>
                        <x-input-error :messages="$errors->get('nationality')" class="mt-2"/>
                    </div>


                    <div class="mb-4">
                        <label for="nemis_code" class="block text-sm font-medium text-gray-700">{{ __('NEMIS Code') }}</label>
                        <input type="text" name="nemis_code" id="nemis_code" value="{{ old('nemis_code') }}"
                               class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <x-input-error :messages="$errors->get('nemis_code')" class="mt-2"/>
                    </div>

                    <div class="mb-4">
                        <label for="doa" class="block text-sm font-medium text-gray-700">{{ __('Date of Admission') }}</label>
                        <input type="date" name="doa" id="doa" value="{{ old('doa') }}" required
                               class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <x-input-error :messages="$errors->get('doa')"
                        class="mt-2"/>
                    </div>

                    <div class="mb-4">
                        <label for="contact" class="block text-sm font-medium text-gray-700">{{ __('Contact') }}</label>
                        <input type="text" name="contact" id="contact" value="{{ old('contact') }}" required
                               class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <x-input-error :messages="$errors->get('contact')" class="mt-2"/>
                    </div>

                    <div class="mb-4">
                        <label for="school_class_id" class="block text-sm font-medium text-gray-700">{{ __('Class') }}</label>
                        <select name="stream_id" id="stream_id" required
                                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="">{{ __('Select Class') }}</option>
                            @foreach($classes as $class)
                                <option value="{{ $class['id'] }}" {{ old('stream_id') == $class['id'] ? 'selected' : '' }}>{{ $class['name'] }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('stream_id')" class="mt-2"/>
                    </div>


                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">{{ __('Status') }}</label>
                        <select name="status" id="status" required class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="transferred" {{ old('status') == 'transferred' ? 'selected' : '' }}>Transferred</option>
                            <option value="suspended" {{ old('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2"/>
                    </div>


                    <x-primary-button class="mt-4">{{ __('Add Learner') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
</x-app-layout>
