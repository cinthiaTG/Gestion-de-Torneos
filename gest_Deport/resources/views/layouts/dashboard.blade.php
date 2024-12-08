<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>

    @php
        $dashboardRoutes = [
            'aficionado.dashboard',
            'entrenador.dashboard',
            'jugador.dashboard',
            'arbitro.dashboard',
            'admin.dashboard',
        ];
    @endphp

    <div class="flex flex-col min-h-screen">

        <!-- Carrusel en el encabezado para aficionados.dashboard -->
        @if (Route::currentRouteName() === 'aficionado.dashboard')
            <div class="relative mx-auto mt-4 w-full overflow-hidden rounded-lg shadow-md">
                <div id="text-carousel" class="flex transition-transform duration-700 ease-in-out">
                    <div class="w-full flex-shrink-0 text-center bg-blue-500 py-16">
                        <h3 class="text-4xl font-bold text-white">{{ __('¡Bienvenido al espacio de aficionados!') }}</h3>
                    </div>
                    <div class="w-full flex-shrink-0 text-center bg-blue-600 py-16">
                        <h3 class="text-4xl font-bold text-white">{{ __('¡Actualizaciones al alcance de tu mano!') }}
                        </h3>
                    </div>
                    <div class="w-full flex-shrink-0 text-center bg-blue-800 py-16">
                        <h3 class="text-4xl font-bold text-white">{{ __('¡Explora contenido nuevo y noticias!') }}</h3>
                    </div>
                </div>
            </div>
        @endif

        <!-- Carrusel para Arbitro  -->
        @if (Route::currentRouteName() === 'arbitro.dashboard')
            <div class="relative mx-auto mt-4 w-3/4 overflow-hidden rounded-lg shadow-md">
                <div id="arbitro-carousel" class="flex transition-transform duration-700 ease-in-out">
                    <div class="w-full flex-shrink-0 text-center p-8 bg-purple-500">
                        <h3 class="text-4xl font-bold text-white" style="font-size: 50px; margin-top: 10px">
                            {{ __('¡Bienvenido usuario Arbitro!') }}</h3>
                        <h3 class="text-4xl font-bold text-white" style="font-size: 50px; margin-top: 10px">
                            {{ __('¿Qué deseas hacer hoy?') }}</h3>
                    </div>
                </div>
            </div>
        @endif

        <!-- Carrusel para Entrenador -->
        @if (Route::currentRouteName() === 'entrenador.dashboard')
            <div class="relative mx-auto mt-4 w-3/4 overflow-hidden rounded-lg shadow-md">
                <div id="entrenador-carousel" class="flex transition-transform duration-700 ease-in-out">
                    <div class="w-full flex-shrink-0 text-center p-8 bg-orange-500">
                        <h3 class="text-4xl font-bold text-white" style="font-size: 50px; margin-top: 10px">
                            {{ __('¡Bienvenido usuario Entrenador!') }}</h3>
                        <h3 class="text-4xl font-bold text-white" style="font-size: 50px; margin-top: 10px">
                            {{ __('¿Qué deseas hacer hoy?') }}</h3>
                    </div>
                </div>
            </div>
        @endif

        <head>
            @yield('styles')
        </head>

        <div class="flex-grow">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-8 bg-gradient-to-r from-blue-500 to-white rounded-xl shadow-md border overflow-hidden sm:rounded-lg"
                    style="margin-top: 3%">
                    <div class="p-6 text-gray-900">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <hr>

        <!-- Este contenido solo se ve en el dashboard de arbitro -->
        @if (Route::currentRouteName() === 'aficionado.dashboard')
            <div class="container-fluid mt-6">
                <h1 class="text-3xl font-bold mb-4 text-center">Partidos</h1>
                <!-- Cards de noticias 1 -->

                <div class="row">
                    @forelse($partidosFinalizados as $partido)
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <p class="card-text">
                                        <strong>Equipo Local:</strong>
                                        {{ $partido->equipoLocal->nombre_equipo ?? 'N/A' }}<br>
                                        <td>
                                            <a href="{{ asset('storage/escudos/' . ($partido->equipoLocal->escudos ?? 'default.png')) }}"
                                                target="_blank">
                                                <img src="{{ asset('storage/escudos/' . ($partido->equipoLocal->escudos ?? 'default.png')) }}"
                                                    alt="Escudo del equipo local" class="team-logo" width="50">
                                            </a>
                                        </td>
                                        <strong>Equipo Visitante:</strong>
                                        {{ $partido->equipoVisitante->nombre_equipo ?? 'N/A' }}<br>
                                        <td>
                                            <a href="{{ asset('storage/escudos/' . ($partido->equipoVisitante->escudos ?? 'default.png')) }}"
                                                target="_blank">
                                                <img src="{{ asset('storage/escudos/' . ($partido->equipoVisitante->escudos ?? 'default.png')) }}"
                                                    alt="Escudo del equipo visitante" class="team-logo" width="50">
                                            </a>
                                        </td>
                                        <strong>Ganador:</strong>
                                        {{ $partido->ganador->nombre_equipo ?? 'Empate' }}<br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">No hay partidos finalizados para mostrar.</p>
                    @endforelse
                </div>


                <hr>


                <main class="flex-grow container mx-auto py-16 px-20">
                    <div class="bg-white shadow-md rounded-lg p-8 text-center">
                        <div class="cont">
                            <h2 class="title">¡Empieza a gestionar tus torneos hoy!</h2>
                            <p class="desc">
                                Sportivo te ofrece todas las herramientas necesarias para organizar torneos, administrar
                                equipos y seguir de cerca cada jugada. Conecta a tus jugadores, equipos y aficionados en
                                un solo lugar. ¡Explora las funcionalidades y lleva tu pasión por los deportes al
                                siguiente nivel!
                            </p>
                        </div>

                        <div class="mt-8 grid sm:grid-cols-1 md:grid-cols-1 gap-8">
                            <div class="flex justify-center items-center">
                                <img class="img"
                                    style="border-radius: 12px; width: 70%; display: flex; justify-content: center; align-items: center;"
                                    src="{{ asset('img/image.png') }}" alt="Sportivo Image">
                            </div>
                        </div>
                    </div>
                </main>
        @endif

        <footer class="mt-auto bg-gray-800 text-white text-center py-5">
            <h2 class="text-3xl font-bold mb-2">&copy; {{ date('Y') }} SPORTIVO</h2>
            <p class="text-lg mb-2">{{ __('Todos los derechos reservados.') }}</p>
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
