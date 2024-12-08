<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('Css/welcome.css') }}">
    <title>Bienvenido a Sportivo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex flex-col min-h-screen">
        <!-- Header -->
        <header class="bg-blue-600 text-white p-4 shadow-md">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-2xl font-bold">Sportivo</h1>
                <nav>
                    <a href="/login" class="px-4 py-2 text-sm bg-blue-500 rounded hover:bg-blue-700 transition">Login</a>
                    <a href="/register" class="px-4 py-2 text-sm bg-gray-200 text-blue-600 rounded hover:bg-gray-300 transition">Register</a>
                </nav>
            </div>
        </header>

        <!-- Welcome Section -->
        <main class="flex-grow container mx-auto py-16 px-6">
            <div class="bg-white shadow-md rounded-lg p-8 text-center">
                <h2 class="text-4xl font-bold text-blue-600">¡Bienvenido a Sportivo!</h2>
                <p class="mt-4 text-gray-600">
                    Tu plataforma para gestionar torneos deportivos de forma eficiente y sencilla.
                </p>
                <div class="mt-8 grid sm:grid-cols-2 gap-8">
                    <!-- Manage Tournaments -->
                    <div class="p-6 bg-blue-50 rounded-lg shadow">
                        <h3 class="text-2xl font-semibold text-blue-600">Gestión de Torneos</h3>
                        <p class="mt-2 text-gray-500">
                            Organiza torneos, gestiona equipos y lleva un registro de las estadísticas de cada partido.
                        </p>
                    </div>
                    <!-- Stay Updated -->
                    <div class="p-6 bg-blue-50 rounded-lg shadow">
                        <h3 class="text-2xl font-semibold text-blue-600">Actualizaciones en Tiempo Real</h3>
                        <p class="mt-2 text-gray-500">
                            Proporciona información en tiempo real para tus equipos y aficionados.
                        </p>
                    </div>
                </div>
            </div>
        </main>
        
        <hr>

        <main class="flex-grow container mx-auto py-16 px-20">
            <div class="bg-white shadow-md rounded-lg p-8 text-center">
                <div class="cont">
                    <h2 class="title">¡Empieza a gestionar tus torneos hoy!</h2>
                    <p class="desc">
                        Sportivo te ofrece todas las herramientas necesarias para organizar torneos, administrar equipos y seguir de cerca cada jugada. Conecta a tus jugadores, equipos y aficionados en un solo lugar. ¡Explora las funcionalidades y lleva tu pasión por los deportes al siguiente nivel!
                    </p>
                </div>
        
                <div class="mt-8 grid sm:grid-cols-1 md:grid-cols-1 gap-8">
                    <div class="flex justify-center items-center">
                        <img class="img" style="border-radius: 12px; width: 70%; display: flex; justify-content: center; align-items: center;" src="{{ asset('img/image.png') }}" alt="Sportivo Image">
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-gray-400 py-4">
            <div class="container mx-auto text-center">
                <p>Sportivo &copy; 2024. Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>
</body>
</html>