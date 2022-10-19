@if (\Illuminate\Support\Facades\Auth::check())
<x-app-layout>

</x-app-layout>
@else
<x-guest-layout>
    <p class=" ml-5 mt-10"> To add some services to database click services in navbar</p>
    <p class=" ml-5 mt-10">Timing part is not complete</p>
</x-guest-layout>
@endif
{{--{{dd($opentag)}}--}}
{{--{!! $opentag !!}--}}

{{--                <p class=" ml-5 mt-10"> To add services to database click services in navbar</p>--}}
{{--                <p class=" ml-5 mt-10">Timing part is not complete</p>--}}
{{--{!! $clostag !!}--}}
