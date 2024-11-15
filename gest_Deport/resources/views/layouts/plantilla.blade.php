<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema Deportivo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <!-- Barra superior -->
    <header class="bg-dark text-white py-2">
        <div class="container d-flex justify-content-end align-items-center">
            <input type="text" class="form-control me-3 w-auto" placeholder="Buscar..." aria-label="Buscar">
            <a href="#" class="text-white me-3">Clasificación</a>
            <a href="#" class="text-white me-3" data-bs-toggle="modal" data-bs-target="#notificacionesModal">Notificaciones</a>
            <a href="{{route('vistas.perfila')}}" class="text-white">Perfil</a>
        </div>
    </header>

    <!-- Menú de navegación principal -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{route('vistas.noticias')}}">SPORTIVO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('vistas.noticias') }}">Noticias</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('vistas.enVivo') }}">En Vivo</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('vistas.ranking') }}">Rankings</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Favoritos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Calendario</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Estadísticas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('vistas.torneo') }}">Torneos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Más</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container my-4">
        @yield('content')
    </main>

    <!-- Modal de Notificaciones -->
    <div class="modal fade" id="notificacionesModal" tabindex="-1" aria-labelledby="notificacionesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificacionesModalLabel">Notificaciones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <!-- Aquí puedes agregar el contenido de las notificaciones -->
                    <p>No tienes nuevas notificaciones.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>