@extends('layouts/dashboard')
@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aficionado</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-4">
    <h1>Lista de Usuarios</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <label for="addOption" class="form-label">¿Que desea agregar?</label>
        <select id="addOption" class="form-select">
            <option value="" selected>Seleccione una opción</option>
            <option value="torneo">Torneo</option>
            <option value="instalacion">Instalación</option>
            <option value="equipo">Equipo</option>
            <option value="jugador">Jugador</option>
        </select>
    </div>

    <div id="searchSectionPlayers" class="mb-3" style="display: none;">
        <label for="searchInputPlayers" class="form-label">Buscar por nombre</label>
        <div class="input-group">
            <input type="text" id="searchInputPlayers" class="form-control" placeholder="Ingrese el nombre">
            <button id="searchButtonPlayers" class="btn btn-primary">Buscar</button>
        </div>
    </div>

    <table class="table table-striped" id="playersTable" style="display: none;">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Edad</th>
            <th>Posición</th>
            <th>ID de Equipo</th>
        </tr>
        </thead>
        <tbody>
        <!-- Para mostrar los resultados -->
        </tbody>
    </table>


    <div id="searchSectionFacilities" class="mb-3" style="display: none;">
        <label for="searchInputFacilities" class="form-label">Buscar por nombre</label>
        <div class="input-group">
            <input type="text" id="searchInputFacilities" class="form-control" placeholder="Ingrese el nombre">
            <button id="searchButtonFacilities" class="btn btn-primary">Buscar</button>
        </div>
    </div>

    <table class="table table-striped" id="FacilitiesTable" style="display: none;">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Ubicacion</th>
            <th>Deporte</th>
        </tr>
        </thead>
        <tbody>
        <!-- Para mostrar los resultados -->
        </tbody>
    </table>

    <button id="downloadPdfButtonPlayers" class="btn btn-success" style="display:none;">Generar PDF</button>
    <button id="downloadPdfButtonFacilities" class="btn btn-success" style="display:none;">Generar PDF</button>

    <!-- SCRIPT -->
    <!-- SCRIPT -->
    <!-- SCRIPT -->
    <!-- SCRIPT -->
    <!-- SCRIPT -->
    <!-- SCRIPT -->
    <!-- SCRIPT -->
    <!-- SCRIPT -->
    <!-- SCRIPT -->
    <!-- SCRIPT -->
    <!-- SCRIPT -->
    <!-- SCRIPT -->
    <!-- SCRIPT -->
    <script>
        $(document).ready(function () {
            $('#addOption').change(function () {
                const selectedOption = $(this).val();

                // Ocultar todas las secciones y botones antes de mostrar las relevantes
                $('#searchSectionPlayers, #playersTable, #searchSectionFacilities, #FacilitiesTable, #downloadPdfButtonPlayers, #downloadPdfButtonFacilities').hide();

                if (selectedOption === "jugador") {
                    $('#searchSectionPlayers').show();

                    // Asociar evento de clic al botón de búsqueda de jugadores
                    $('#searchButtonPlayers').off('click').on('click', function () {
                        const searchValuePlayers = $('#searchInputPlayers').val();

                        if (!searchValuePlayers.trim()) {
                            alert('Por favor, ingrese un nombre para buscar.');
                            return;
                        }

                        $.ajax({
                            url: '/entrenador/jugadores/buscar',
                            type: 'GET',
                            data: {
                                nombre: searchValuePlayers
                            },
                            success: function (jugadores) {
                                const jugadoresContainer = $('#playersTable tbody');
                                jugadoresContainer.empty();

                                if (Array.isArray(jugadores) && jugadores.length > 0) {
                                    jugadores.forEach(function (jugador) {
                                        const idEquipo = jugador.id_equipo;

                                        const row = $(`
                                    <tr>
                                        <td>${jugador.id}</td>
                                        <td>${jugador.nombre}</td>
                                        <td>${jugador.apellido_paterno}</td>
                                        <td>${jugador.apellido_materno}</td>
                                        <td>${jugador.edad}</td>
                                        <td>${jugador.posicion}</td>
                                        <td id="equipo-${jugador.id}">${idEquipo}</td>
                                    </tr>
                                `);

                                        jugadoresContainer.append(row);

                                        // Obtener nombre del equipo
                                        $.ajax({
                                            url: '/entrenador/equipos/buscar',
                                            type: 'GET',
                                            data: {
                                                id: idEquipo
                                            },
                                            success: function (equipo) {
                                                if (equipo && equipo.nombre) {
                                                    $(`#equipo-${jugador.id}`).text(equipo.nombre);
                                                }
                                            },
                                            error: function () {
                                                $(`#equipo-${jugador.id}`).text('No asignado');
                                            }
                                        });
                                    });

                                    $('#playersTable').show(); // Mostrar tabla de jugadores
                                    $('#downloadPdfButtonPlayers').show(); // Mostrar botón de PDF
                                } else {
                                    alert('No se encontraron jugadores.');
                                }
                            },
                            error: function () {
                                alert('Ocurrió un error al buscar los jugadores.');
                            }
                        });
                    });

                    // Evento para descargar PDF de jugadores
                    $('#downloadPdfButtonPlayers').off('click').on('click', function () {
                        const searchValuePlayers = $('#searchInputPlayers').val();

                        if (!searchValuePlayers.trim()) {
                            alert('Por favor, ingrese un nombre para generar el PDF.');
                            return;
                        }

                        window.location.href = '/generar-pdf-jugador?nombre=' + searchValuePlayers;
                    });

                } else if (selectedOption === "instalacion") {
                    $('#searchSectionFacilities').show();

                    // Asociar evento de clic al botón de búsqueda de instalaciones
                    $('#searchButtonFacilities').off('click').on('click', function () {
                        const searchValueFacilities = $('#searchInputFacilities').val();

                        if (!searchValueFacilities.trim()) {
                            alert('Por favor, ingrese un nombre para buscar.');
                            return;
                        }

                        $.ajax({
                            url: '/entrenador/instalaciones/buscar',
                            type: 'GET',
                            data: {
                                nombre: searchValueFacilities
                            },
                            success: function (instalaciones) {
                                const instalacionesContainer = $('#FacilitiesTable tbody');
                                instalacionesContainer.empty();

                                if (Array.isArray(instalaciones) && instalaciones.length > 0) {
                                    instalaciones.forEach(function (instalacion) {
                                        const idDeporte = instalacion.id_deporte;

                                        const row = $(`
                                    <tr>
                                        <td>${instalacion.id}</td>
                                        <td>${instalacion.nombre_instalacion}</td>
                                        <td>${instalacion.ubicacion}</td>
                                        <td id="deporte-${instalacion.id}">${idDeporte}</td>
                                    </tr>
                                `);

                                        instalacionesContainer.append(row);

                                        // Obtener nombre del deporte
                                        $.ajax({
                                            url: '/entrenador/deporte/buscar',
                                            type: 'GET',
                                            data: {
                                                id: idDeporte
                                            },
                                            success: function (deporte) {
                                                if (deporte && deporte.nombre) {
                                                    $(`#deporte-${instalacion.id}`).text(deporte.nombre);
                                                }
                                            },
                                            error: function () {
                                                $(`#deporte-${instalacion.id}`).text('No asignado');
                                            }
                                        });
                                    });

                                    $('#FacilitiesTable').show(); // Mostrar tabla de instalaciones
                                    $('#downloadPdfButtonFacilities').show(); // Mostrar botón de PDF
                                } else {
                                    alert('No se encontraron instalaciones.');
                                }
                            },
                            error: function () {
                                alert('Ocurrió un error al buscar las instalaciones.');
                            }
                        });
                    });

                    // Evento para descargar PDF de instalaciones
                    $('#downloadPdfButtonFacilities').off('click').on('click', function () {
                        const searchValueFacilities = $('#searchInputFacilities').val();

                        if (!searchValueFacilities.trim()) {
                            alert('Por favor, ingrese un nombre para generar el PDF.');
                            return;
                        }

                        window.location.href = '/generar-pdf-instalacion?nombre=' + searchValueFacilities;
                    });

                } else {
                    // Ocultar todas las secciones si no se selecciona nada o "Seleccione una opción"
                    $('#searchSectionPlayers, #playersTable, #searchSectionFacilities, #FacilitiesTable').hide();
                }
            });
        });
    </script>
</div>
</body>
</html>
@endsection

