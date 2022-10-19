<x-app-layout>
    <div class="flex items-center justify-center p-12">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="mx-auto w-full max-w-[550px] bg-white">
        <h1 class=" text-center text-3xl">Make Appointment</h1>
            <form method="POST">
                @csrf

                <div class="mb-3">
                    <label for="services" class="mb-3 block text-base font-medium text-[#07074D]">Select your Services</label>
{{--                    <select name="services" id="services" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">--}}
{{--                        @foreach($services as $service)--}}
{{--                            <option value="{{$service->id}}">{{$service->name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
                    @foreach($services as $service)
                        <div class="flex items-center mb-4 gap-2">
                            <input id="service_{{ $service->id }}"
                                   type="checkbox"
                                   value="{{ $service->id }}"
                                   name="services[]"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300
                                                                focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800
                                                                 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                {{ in_array($service->id , old('services') ?? []) ? 'checked' : '' }}
                            >
                            <label for="service_{{ $service->id }}"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $service->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="checkbox" class="mb-3  text-base font-medium text-[#07074D]">Closest time</label>
                    <input type="checkbox" id="checkbox" name="checkbox" checked>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label
                                for="date"
                                class="mb-3 block text-base font-medium text-[#07074D]"
                            >
                                Date
                            </label>
                            <input
                                type="date"
                                name="date"
                                id="date"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                disabled
                            />

                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label
                                for="time"
                                class="mb-3 block text-base font-medium text-[#07074D]"
                            >
                                Time
                            </label>
                            <input
                                type="time"
                                name="time"
                                id="time"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                disabled
                            />
                        </div>
                    </div>
                </div>
                <div>
                    <button
                        class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
                    >
                        Book Appointment
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
    </div>
        <script>
            $("#checkbox").click(function () {
                if ($('#checkbox').is(':checked')) {
                    $('#date').prop('disabled', true);
                    $('#time').prop('disabled', true);
                } else {
                    $('#date').prop('disabled', false);
                    $('#time').prop('disabled', false);

                }
            });
        </script>
</x-app-layout>

