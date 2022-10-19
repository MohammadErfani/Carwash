<x-manager>
    <ul>
        @foreach ($users as $user)
            <form action="{{route('showUser')}}" method="post">
                @csrf
                <input type="hidden" value="{{$user->id}}" name="id">
                <button type="submit"
                        class="hover:shadow-form mx-auto rounded-md bg-{{$user->color}}-600 py-3 px-8 text-center text-base font-semibold text-white outline-none">
                    {{$user->name}}
                </button>
            <div class="bg-gray-500">paids: {{$user->price}}</div>
            </form>

        @endforeach
    </ul>
</x-manager>
