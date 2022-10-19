<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}
@if(session('message'))
    <p class="text-green-700">{{session('message')}}</p>
    @endif
</x-app-layout>
