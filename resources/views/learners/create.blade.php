@extends('layouts.admin')
@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{$title}}
    </h2>
    <form action="{{route('learners.store')}}" method="post">
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 grid grid-cols-1 md:grid-cols-3 gap-2 ">

            <div class="my-1">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Stream
                    </span>
                    <select name="stream_id" id="select" class="block w-full text-sm border-r-2 border-gray-950 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        @foreach ($streams as $stream)
                            <option value="{{ $stream->id }}"
                                {{ request('stream_id') == $stream->id ? 'selected' : '' }}>
                                {{ $stream->classes->name }} {{ $stream->name }}
                            </option>
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
                    <input name="name" placeholder="Enter student Name" value="{{old('name')}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('name')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Assessment No:</span>
                    <input name="assessment_no" placeholder="Enter Assessment No" value="{{old('assessment_no')}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('assessment_no')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Admission No:</span>
                    <input name="admission_no" placeholder="Enter Admission No" value="{{old('admission_no')}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
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

                        <option>- Select Gender - </option>
                        <option value="Male">Male</option>
                        <option value="Fale">Female</option>

                    </select>
                </label>
                @error('gender')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">DOB</span>
                    <input type="date" name="dob" placeholder="Enter date" value="{{old('dob')}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('dob')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">BC_PP Entry No</span>
                    <input name="bc_pp_entry_no" placeholder="Enter bc pp entry No" value="{{old('bc_pp_entry_no')}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('bc_pp_entry_no')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-1">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Nationality
                    </span>
                    <select name="nationality" id="select" class="block w-full text-sm border-r-2 border-gray-950 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">

                        <option>- Select Nationality - </option>
                        <option value="Citizen">Citizen</option>
                        <option value="Non-Citizen">Non-Citizen</option>

                    </select>
                </label>
                @error('nationality')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>


            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Nemis Code</span>
                    <input name="nemis_code" placeholder="Enter Nemis_Code No" value="{{old('nemis_code')}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('nemis_code')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>


            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Date Of Addmision</span>
                    <input type="date" name="date_of_addmission" value="{{old('date_of_addmission')}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('date_of_addmission')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Contact Person</span>
                    <input name="contact" placeholder="Enter Contact Person No" value="{{old('contact')}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
                @error('contact')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="my-1">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Co-Curricular Activity
                    </span>
                    <select name="co_curricular_activity" id="select" class="block w-full text-sm border-r-2 border-gray-950 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">

                        <option>- Select Co-Curricular Activity - </option>
                        <option value="Male">Taekwondo</option>
                        <option value="Fale">Soccer</option>

                    </select>
                </label>
                @error('co_curricular_activity')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="my-1">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Transport Route
                    </span>
                    <select name="transport_route" id="select" class="block w-full text-sm border-r-2 border-gray-950 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option>- Select Transport Route - </option>
                        <option value="BATU BATU">BATU BATU</option>
                        <option value="3RD AVENUE">3RD AVENUE</option>
                        <option value="MARINE HEIGHTS">MARINE HEIGHTS</option>
                        <option value="MIAMI ROAD">MIAMI ROAD</option>
                        <option value="PARK VILLA">PARK VILLA</option>
                        <option value="AURA">AURA</option>
                        <option value="SUSWA">SUSWA</option>
                        <option value="AGA KHAN">AGA KHAN</option>
                        <option value="PARKLANDS">PARKLANDS</option>
                        <option value="NAJHA PARK">NAJHA PARK</option>
                        <option value="CHINGA DAM">CHINGA DAM</option>
                        <option value="RAHAL TOWERS">RAHAL TOWERS</option>
                        <option value="DON BOSCO">DON BOSCO</option>
                        <option value="JUJA CORNER">JUJA CORNER</option>
                        <option value="FOREST ROAD">FOREST ROAD</option>
                        <option value="FOURTH STREET">FOURTH STREET</option>
                        <option value="MARIE STOP">MARIE STOP</option>
                        <option value="JAM STREET">JAM STREET</option>
                        <option value="USHIRIKA">USHIRIKA</option>
                        <option value="JUJA B">JUJA B</option>
                        <option value="MURATINA ROAD">MURATINA ROAD</option>
                        <option value="KARIOKOR">KARIOKOR</option>
                        <option value="MEMON">MEMON</option>
                        <option value="KWA KUNI">KWA KUNI</option>
                        <option value="CROSS ROAD">CROSS ROAD</option>
                        <option value="MABRUK 2">MABRUK 2</option>
                        <option value="CALIFORNIA">CALIFORNIA</option>
                        <option value="Pumwani">Pumwani</option>
                        <option value="KHADIJA PLAZA">KHADIJA PLAZA</option>
                        <option value="HIGH RISE">HIGH RISE</option>
                        <option value="SAFARICOM">SAFARICOM</option>
                        <option value="BBS MALL">BBS MALL</option>
                        <option value="BURHAN">BURHAN</option>
                        <option value="CHAI ROAD HEIGHTS">CHAI ROAD HEIGHTS</option>
                        <option value="CITY PARK">CITY PARK</option>
                        <option value="CITY PARK DRIVE">CITY PARK DRIVE</option>
                        <option value="BATU BATU GARDENS">BATU BATU GARDENS</option>
                        <option value="1ST AVENUE PARKLAND">1ST AVENUE PARKLAND</option>
                        <option value="PANGANI">PANGANI</option>
                        <option value="JUJA A">JUJA A</option>
                        <option value="AL-AMEEN">AL-AMEEN</option>
                        <option value="UNITED TOWER">UNITED TOWER</option>
                        <option value="PARK ROAD">PARK ROAD</option>
                        <option value="DARUSUNNAH">DARUSUNNAH</option>
                        <option value="CHICKEN POP">CHICKEN POP</option>
                        <option value="CHAI ROAD">CHAI ROAD</option>
                        <option value="JUJA B ESTATE">JUJA B ESTATE</option>
                        <option value="AL-AMEEN SCHOOL.">AL-AMEEN SCHOOL.</option>
                        <option value="PARKROAD">PARKROAD</option>
                        <option value="PARKROAD 1 WAY">PARKROAD 1 WAY</option>
                        <option value="PANGANI">PANGANI</option>
                        <option value="PANGANI 1 WAY">PANGANI 1 WAY</option>
                        <option value="CITY PARK">CITY PARK</option>
                        <option value="CITY PARK 1 WAY">CITY PARK 1 WAY</option>
                        <option value="PARKLANDS">PARKLANDS</option>
                        <option value="PARKLANDS 1 WAY">PARKLANDS 1 WAY</option>
                    </select>
                </label>
                @error('transport_route')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="my-1">
                <label for="bus_id" class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                            Select Bus
                    </span>
                </label>
                <select name="bus_id" id="bus_id" class="block w-full text-sm border-r-2 border-gray-950 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option value="">-- Select Bus --</option>
                    @foreach ($buses as $bus)
                        <option value="{{ $bus->id }}" {{ old('bus_id') == $bus->id ? 'selected' : '' }}>
                            {{ $bus->number_plate }} - {{ $bus->route }}
                        </option>
                    @endforeach
                </select>
                @error('bus_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="my-1">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        School Lunch
                    </span>
                    <select name="lunch" class="block w-full mt-1 text-sm dark:bg-gray-700 dark:text-gray-300 form-select">
                        <option value="1" {{ old('lunch', $learner->lunch ?? '') == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('lunch', $learner->lunch ?? '') == 0 ? 'selected' : '' }}>No</option>
                    </select>
                </label>
                @error('lunch')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>


        </div>
        <button class="p-2 bg-purple-600 ml-1 w-56 text-white hover:bg-purple-700 type=" submit">Submit</button>

    </form>
</div>
@endsection
