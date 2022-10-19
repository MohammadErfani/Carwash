<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
{{--@include('layouts.navigation')--}}

<!-- Page Heading -->
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="/" class="flex items-center">

                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Car Wash</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="/" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <aside class="w-64 ml-5  sticky top-0 " aria-label="Sidebar">
        <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800 ">
            <ul class="space-y-2">
                <li>
                    <a href="/manager" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="ml-3">Manager Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('allUsers')}}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="flex-1 ml-3 whitespace-nowrap">All Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('allServices')}}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="flex-1 ml-3 whitespace-nowrap">All Services</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('createService')}}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="flex-1 ml-3 whitespace-nowrap">Create New Service</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
</body>
</html>
