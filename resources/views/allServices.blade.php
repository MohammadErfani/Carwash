<x-manager>
        <ul>
            @foreach ($services as $service)
                <form action="{{route('showService')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$service->id}}" name="id">
                    <button type="submit"
                            class="hover:shadow-form mx-auto rounded-md bg-green-600 py-3 px-8 text-center text-base font-semibold text-white outline-none">
                        {{$service->name}}
                    </button>
                    <div class="bg-orange-500">price: {{$service->price}}</div>
                    <div class="bg-orange-500">duration: {{$service->duration}}</div>
                </form>

            @endforeach
        </ul>
</x-manager>
