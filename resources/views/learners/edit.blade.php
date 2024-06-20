@extends('layouts.admin')
@section('content')

<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{$title}}
    </h2>
    <form action="{{route('learners.update', $learner->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 grid grid-cols-1 md:grid-cols-3 gap-2 ">

            <div class="my-1">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Stream
                    </span>
                    <select name="stream_id" id="select" class="block w-full text-sm border-r-2 border-gray-950 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        @foreach ($streams as $stream)
                        <option value="{{$stream->id}}">{{$stream->classes->name}} {{$stream->name}}</option>
                        @endforeach
                    </select>
                </label>
                @error('stream_id')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input name="name" placeholder="Enter student Name" value="{{$learner->name}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('name')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Assessment No:</span>
                    <input name="assessment_no" placeholder="Enter Assessment No" value="{{$learner->assessment_no}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('assessment_no')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Admission No:</span>
                    <input name="admission_no" placeholder="Enter Admission No" value="{{$learner->admission_no}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('admission_no')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-1">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Gender
                    </span>
                    <select name="gender" id="select" class="block w-full text-sm border-r-2 border-gray-950 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">

                        <option>{{$learner->gender}} </option>
                        <option value="male">Male</option>
                        <option value="male">Female</option>

                    </select>
                </label>
                @error('gender')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">DOB</span>
                    <input type="date" name="dob" placeholder="Enter date" value="{{$learner->dob}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('dob')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">BC_PP Entry No</span>
                    <input name="bc_pp_entry_no" placeholder="Enter bc pp entry No" value="{{$learner->bc_pp_entry_no}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('bc_pp_entry_no')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Nationality</span>
                    <input name="nationality" placeholder="Enter Nationality " value="{{$learner->nationality}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('nationality')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>


            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Nemis Code</span>
                    <input name="nemis_code" placeholder="Enter Nemis_Code No" value="{{$learner->nemis_code}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('nemis_code')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>


            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Date Of Addmision</span>
                    <input type="date" name="date_of_addmission" value="{{$learner->date_of_addmission}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('date_of_addmission')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Contact Person</span>
                    <input name="contact" placeholder="Enter Contact Person No" value="{{$learner->contact}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('contact')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-1">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Status
                    </span>
                    <select name="status" id="select" class="block w-full text-sm border-r-2 border-gray-950 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">

                        <option>{{$learner->status !== null ? $learner->status : '- select status - '}}</option>
                        <option value="active">Active</option>
                        <option value="transffered">Transffered</option>
                        <option value="inactive">Inactive</option>

                    </select>
                </label>
                @error('status')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="p-2 bg-purple-600 ml-1 w-56 text-white hover:bg-purple-700 type=" submit">Submit</button>

    </form>
</div>
@endsection