<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>

    @php
        $dashboardRoutes = [
            'aficionado.dashboard',
            'entrenador.dashboard',
            'jugador.dashboard',
            'arbitro.dashboard',
            'admin.dashboard'
        ];
    @endphp

    <div class="flex flex-col min-h-screen">
        @if(in_array(Route::currentRouteName(), $dashboardRoutes))
        <div class="relative mx-auto mt-8 w-3/4 overflow-hidden rounded-xl shadow-lg">
            <div id="text-carousel" class="flex transition-transform duration-700 ease-in-out">
                <div class="w-full flex-shrink-0 text-center p-8 bg-purple-500">
                    <h3 class="text-4xl font-bold text-white" style="font-size: 50px; margin-top: 30px">{{ __("Bienvenido a SPORTIVO!") }}</h3>
                </div>
                <div class="w-full flex-shrink-0 text-center p-8 bg-red-500">
                    <h3 class="text-4xl font-bold text-white" style="margin-top: 10px">{{ __("Organiza y administra equipos, torneos y estadísticas deportivas desde un único lugar centralizado.") }}</h3>
                </div>
                <div class="w-full flex-shrink-0 text-center p-8 bg-yellow-500">
                    <h3 class="text-4xl font-bold text-white" style="margin-top: 20px">{{ __("Un sistema pensado para deportistas y aficionados.") }}</h3>
                </div>
            </div>
        </div>
        @endif

        <head>
            @yield('styles')
        </head>
        

        <div class="flex-grow">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-8 bg-gradient-to-r from-blue-500 to-blue-200 rounded-xl shadow-md border overflow-hidden sm:rounded-lg" style="margin-top: 3%">
                    <div class="p-6 text-gray-900">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>

        <footer class="mt-auto bg-gray-800 text-white text-center py-5">
            <h2 class="text-3xl font-bold mb-2">
                &copy; {{ date('Y') }} SPORTIVO
            </h2>
            <p class="text-lg mb-2">
                {{ __("Todos los derechos reservados.") }}
            </p>
        </footer>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const carousel = document.getElementById("text-carousel");
            const slides = carousel.children;
            const totalSlides = slides.length;
            let currentIndex = 0;

            function moveToNextSlide() {
                currentIndex = (currentIndex + 1) % totalSlides;
                const newTransform = `translateX(-${currentIndex * 100}%)`;
                carousel.style.transform = newTransform;
            }

            setInterval(moveToNextSlide, 3000);
        });
    </script>
</x-app-layout>
