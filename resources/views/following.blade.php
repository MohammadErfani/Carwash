@extends('components.layout')
@section('content')
    <div class="flex items-center justify-center p-12">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="mx-auto w-full max-w-[550px] bg-white">
            <h1 class=" text-center text-3xl">Follow Your Appointment</h1>
            <form method="POST">
                @csrf
                <div class="mb-5">
                    <label
                        for="name"
                        class="mb-3 block text-base font-medium text-[#07074D]"
                    >
                        Following Code
                    </label>
                    <input
                        type="text"
                        name="following_code"
                        id="name"
                        placeholder="Following Code"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                </div>
                <div class="mb-5">
                    <label
                        for="phone"
                        class="mb-3 block text-base font-medium text-[#07074D]"
                    >
                        Phone Number
                    </label>
                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        placeholder="Enter your phone number"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                </div>

                <div>
                    <button
                        class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
                    >
                        Search Appointment
                    </button>
                </div>
            </form>


            @if ($errors->any())
                <div class="mt-3 bg-red-50 border border-red-500 text-red-900  text-sm rounded-lg ">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
@endsection
