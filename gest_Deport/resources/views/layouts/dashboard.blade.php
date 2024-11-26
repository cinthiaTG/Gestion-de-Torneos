<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <h1 class="font-semibold text-xl leading-tight" style="font-size: 25px">
            {{ __('Bienvenido') }}
        </h1>
        <p class="font-semibold text-xl text-gray-800 leading-tight" style="font-size: 17px">
            {{ __('Que deseas hacer hoy?') }}
        </p>
    </x-slot>
    <head>
        @yield('styles')
    </head>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 1.5%">

            <div class="p-6 text-gray-900">
                @yield('content')
            </div>
        </div>
        </div>
    </div>
</x-app-layout>