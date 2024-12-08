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

        <head>
            @yield('styles')
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&display=swap');

                * {
                    font-family: 'Parkinsans', sans-serif;
                }

                .card {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                    height: 150px;
                    background-color: white;
                    border: 2px solid #ddd;
                    border-radius: 10px;
                    text-decoration: none;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                    transition: all 0.3s ease;
                    cursor: pointer;
                }

                .card:hover {
                    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
                    transform: translateY(-5px);
                }

                .card-title{
                    font-size: 24px;
                }

                .card-title:hover{
                   color: #2962FF;
                }

            </style>
        </head>

        <!-- Carrusel para Aficionados -->
        @if (Route::currentRouteName() === 'aficionado.dashboard')
            <div class="relative mx-auto mt-4 w-full overflow-hidden rounded-lg shadow-md">
                <div id="text-carousel" class="flex transition-transform duration-700 ease-in-out">
                    <div class="w-full flex-shrink-0 text-center bg-red-500 py-16">
                        <h3 class="text-4xl font-bold text-white">{{ __('¡Bienvenidos Aficionados!') }}</h3>
                    </div>
                    <div class="w-full flex-shrink-0 text-center bg-green-600 py-16">
                        <h3 class="text-4xl font-bold text-white">{{ __('Tu lugar para mantenerte informado sobre las noticias mas importantes del Futbol') }}
                        </h3>
                    </div>
                    <div class="w-full flex-shrink-0 text-center bg-orange-400 py-16">
                        <h3 class="text-4xl font-bold text-white">{{ __('Explora contenido nuevo y actualizaciones todos los dias') }}</h3>
                    </div>
                </div>
            </div>
        @endif

        <!-- Banner para Arbitro  -->
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

        <!-- Banner para Entrenador -->
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
            <div class="container">
                <h1 class="text-3xl font-bold mb-4 text-center">Torneos</h1> <!-- Cards de noticias 1 -->

                <div class="row justify-content-center">
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm text-center">
                            <div class="card-body">
                                <h5 class="card-title">Noticia 1</h5>
                                <p class="card-text">Noticia 1</p>
                                <a href="#" class="btn btn-primary">Ver</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm text-center">
                            <div class="card-body">
                                <h5 class="card-title">Noticia 2</h5>
                                <p class="card-text">Noticia 2</p>
                                <a href="#" class="btn btn-primary">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm text-center">
                            <div class="card-body">
                                <h5 class="card-title">Noticia 3</h5>
                                <p class="card-text">Noticia 3</p>
                                <a href="#" class="btn btn-primary">Ver</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm text-center">
                            <div class="card-body">
                                <h5 class="card-title">Noticia 4</h5>
                                <p class="card-text">Noticia 4</p>
                                <a href="#" class="btn btn-primary">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <hr>
            <!-- Cards de noticias 2 -->

            <main class="flex-grow container mx-auto py-16 px-20">
                <a href="https://www.espn.com.mx/futbol/mexico/nota/_/id/14540604/monterrey-vs-san-luis-historias-martin-demichelis-penal-final" target="_blank" class="card" >
                <div class="bg-white shadow-md rounded-lg p-8 text-center">>
                    <div class="flex flex-col md:flex-row items-center gap-4">
                        <div class="flex justify-center items-center flex-shrink-0">
                            <img class="rounded-lg w-40 h-40 object-cover" 
                                src="{{ asset('img/rayados.png') }}" 
                                alt="Sportivo Image">
                        </div>

                        <div class="text-left">
                            <h2 class="text-lg font-bold text-gray-800" >Las rachas que Rayados acabó en Semifinales</h2>
                            <p class="text-gray-600 text-sm mt-2">Monterrey acabó con varias rachas: eliminó a San Luis en el tercer intento y regresó a la final después de tres eliminaciones en Semifinales</p>
                            <p class="text-xs text-gray-500 mt-4">Ver mas</p>
                        </div>
                    </div>
                </div>
                 </a>
            </main>
            

            <main class="flex-grow container mx-auto py-16 px-20">
                <a href="https://www.espn.com.mx/futbol/mexico/nota/_/id/14540703/monterrey-martin-demichelis-finalista-merecido-apertura-2024" target="_blank" class="card" >
                <div class="bg-white shadow-md rounded-lg p-8 text-center">>
                    <div class="flex flex-col md:flex-row items-center gap-4">
                        <div class="flex justify-center items-center flex-shrink-0">
                            <img class="rounded-lg w-40 h-40 object-cover" 
                                src="{{ asset('img/martin.png') }}" 
                                alt="Sportivo Image">
                        </div>

                        <div class="text-left">
                            <h2 class="text-lg font-bold text-gray-800">Martín Demichelis asegura Rayados es merecido finalista</h2>
                            <p class="text-gray-600 text-sm mt-2">El estratega de Rayados, Martín Demichelis, consideró que su equipo ha tenido altibajos durante la liguilla del Torneo Apertura 2024, pero desde su punto de vista merecidamente están en la final.     </p>
                            <p class="text-xs text-gray-500 mt-4">Ver mas</p>
                        </div>
                    </div>
                </div>
                 </a>
            </main>

            <hr>

            <!-- Noticias -->
            <div class="container-fluid mt-6">
                <h1 class="text-3xl font-bold mb-4 text-center">Noticias y Actualizaciones</h1>

                <!-- Noticia 1 -->
                <div class="row justify-content-center mb-3">
                    <div class="col-md-6">
                        <div class="card shadow-sm text-center">
                            <a href="https://www.espn.com.mx/futbol/mexico/nota/_/id/14540513/monterrey-vs-san-luis-resultado-regresa-final-liga-mx-oliver-torres" target="_blank" class="card" >
                            <div class="card-body">
                                <div class="img-container">
                                    <img src="{{ asset('img/gol.png') }}" alt="Noticia 1" class="card-img">
                                </div>
                                <h5 class="card-title">Rayados golea a San Luis y regresa a
                                    la final de Liga MX</h5>
                                <p class="card-text mt-2" style="font-size: 16px">Rayados goleó 5-1 al Atlético de San
                                    Luis en la vuelta de las semifinales del Apertura 2024, con un marcador global de
                                    6-3. Clasificaron a la final y esperan al rival que saldrá del duelo entre Cruz Azul
                                    y América.</p>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <br>

                <!-- Noticia 3 -->
                <div class="row justify-content-center mb-3">
                    <div class="col-md-6">
                        <div class="card shadow-sm text-center">
                            <a href="https://www.espn.com.mx/futbol/mexico/nota/_/id/14522699/america-vs-cruz-azul-ranking-mejores-jugadores-que-pasaron-ambos-clubes" target="_blank" class="card" >
                            <div class="card-body">
                                <div class="img-container">
                                    <img src="{{ asset('img/america.png') }}" alt="Noticia 1" class="card-img">
                                </div>
                                <h5 class="card-title">Ranking de los mejores jugadores que pasaron por América y Cruz Azul</h5>
                                <p class="card-text mt-2" style="font-size: 16px">
                                    La rivalidad entre América y Cruz Azul nació hace más de 50 años, en la temporada 1971-1972, cuando 'La Máquina' venció 4-1 a las Águilas en su primera final. Luego llegaron épocas de dominio, con Cruz Azul en los 70 y América en los 80, que elevaron la enemistad.</p>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Noticia 3 -->
                <div class="row justify-content-center mb-3">
                    <div class="col-md-6">
                        <div class="card shadow-sm text-center">
                            <a href="https://www.espn.com.mx/futbol/inglaterra/nota/_/id/14539009/manchester-united-vs-nottingham-forest-resumen-goles-cronica-premier-league" target="_blank" class="card" >
                            <div class="card-body">
                                <div class="img-container">
                                    <img src="{{ asset('img/manchester.png') }}" alt="Noticia 1" class="card-img">
                                </div>
                                <h5 class="card-title">Manchester United sigue en caída libre y el Forest aprovechó el momento</h5>
                                <p class="card-text mt-2" style="font-size: 16px">El Manchester United perdió 2-3 contra el Nottingham Forest en Old Trafford, sumando dos derrotas en tres días. La actuación de André Onana y otros errores generan dudas sobre el trabajo de Rubén Amorim.</p>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Noticia 4 -->
                <div class="row justify-content-center mb-3">
                    <div class="col-md-6">
                        <div class="card shadow-sm text-center">
                            <a href="https://www.espn.com.mx/futbol/mls/nota/_/id/14532596/messi-mls-jugador-mas-valioso-2024" target="_blank" class="card" >
                            <div class="card-body">
                                <div class="img-container">
                                    <img src="{{ asset('img/messi.png') }}" alt="Noticia 1" class="card-img">
                                </div>
                                <h5 class="card-title">Messi es el Jugador Más Valioso de la temporada 2024 de la MLS</h5>
                                <p class="card-text mt-2" style="font-size: 16px">Lionel Messi fue elegido el viernes como el ganador del premio Landon Donovan al Jugador Más Valioso de la temporada 2024 de la MLS, superando a Cucho Hernández, Evander, Christian Benteke y Luis Suárez.</p>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>



            <br>
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
