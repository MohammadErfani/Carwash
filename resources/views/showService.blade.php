<x-manager>
    <th>{{$service->name}}</th>
    @foreach($appointments as $appointment)
        <div class="overflow-x-auto relative w-5/6 mx-auto mt-10">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">Name</th>
                    <th scope="col" class="py-3 px-6">Phone</th>
                    <th scope="col" class="py-3 px-6">Services</th>
                    <th scope="col" class="py-3 px-6">Date</th>
                    <th scope="col" class="py-3 px-6">Start Time</th>
                    <th scope="col" class="py-3 px-6">End Time</th>
                    <th scope="col" class="py-3 px-6">Following Code</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="py-4 px-6">{{$appointment->user->name}}</td>
                    <td class="py-4 px-6">{{$appointment->user->phone}}</td>
                    <td class="py-4 px-6">
                        @foreach($appointment->services as $service)
                            {{$service->name}}-@endforeach</td>

                    <td class="py-4 px-6">{{$appointment->date}}</td>
                    <td class="py-4 px-6">{{$appointment->start_time}}</td>
                    <td class="py-4 px-6">{{$appointment->end_time}}</td>
                    <td class="py-4 px-6">{{$appointment->following_code}}</td>

                </tr>
                </tbody>

            </table>
        </div>
        <form action="{{route('deleteAppointment')}}" method="post">
            @csrf
            @method('delete')
            <input type="hidden" value="{{$appointment->id}}" name="id">
            <button type="submit"
                    class="hover:shadow-form mx-auto rounded-md bg-red-600 py-3 px-8 text-center text-base font-semibold text-white outline-none">
                Delete
            </button>
        </form>
    @endforeach
</x-manager>
