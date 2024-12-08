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
        <label for="addOption" class="form-label">¿Que desea buscar?</label>
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
            <th>Edad</th>
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
        </tr>
        </thead>
        <tbody>
        <!-- Para mostrar los resultados -->
        </tbody>
    </table>

    <div id="searchSectionTeams" class="mb-3" style="display: none;">
        <label for="searchInputTeams" class="form-label">Buscar por nombre</label>
        <div class="input-group">
            <input type="text" id="searchInputTeams" class="form-control" placeholder="Ingrese el nombre">
            <button id="searchButtonTeams" class="btn btn-primary">Buscar</button>
        </div>
    </div>

    <table class="table table-striped" id="teamsTable" style="display: none;">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Escudo</th>
            <th>Patrocinador</th>
            <th>Monto del Patrocinador</th>
        <tbody>
        <!-- Para mostrar los resultados -->
        </tbody>
    </table>


    <div id="searchSectionTournament" class="mb-3" style="display: none;">
        <label for="searchInputTournament" class="form-label">Buscar por nombre</label>
        <div class="input-group">
            <input type="text" id="searchInputTournament" class="form-control" placeholder="Ingrese el nombre">
            <button id="searchButtonTournament" class="btn btn-primary">Buscar</button>
        </div>
    </div>

    <table class="table table-striped" id="tournamentTable" style="display: none;">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad de Equipos</th>
            <th>Patrocinador</th>
            <th>Monto de Patrocinador</th>
        <tbody>
        <!-- Para mostrar los resultados -->
        </tbody>
    </table>

    <button id="downloadPdfButtonPlayers" class="btn btn-success" style="display:none;">Generar PDF</button>
    <button id="downloadPdfButtonFacilities" class="btn btn-success" style="display:none;">Generar PDF</button>
    <button id="downloadPdfButtonTeams" class="btn btn-success" style="display:none;">Generar PDF</button>
    <button id="downloadPdfButtonTournament" class="btn btn-success" style="display:none;">Generar PDF</button>

    <!-- contenido noticias -->



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
                $('#searchSectionPlayers, #playersTable, #downloadPdfButtonPlayers').hide();
                $('#searchSectionFacilities, #FacilitiesTable, #downloadPdfButtonFacilities').hide();
                $('#searchSectionTeams, #teamsTable, #searchSectionTeams,#downloadPdfButtonTeams').hide();
                $('#searchSectionTournament, #tournamentTable, #searchSectionTournament,#downloadPdfButtonTournament').hide();


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
                                        <td>${jugador.edad}</td>
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
                                        const row = $(`
                                    <tr>
                                        <td>${instalacion.id}</td>
                                        <td>${instalacion.nombre_instalacion}</td>
                                        <td>${instalacion.ubicacion}</td>
                                    </tr>
                                `);

                                        instalacionesContainer.append(row);
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

                } else if (selectedOption === "equipo") {
                    $('#searchSectionTeams').show();

                    $('#searchButtonTeams').off('click').on('click', function () {
                        const searchValueTeams = $('#searchInputTeams').val();

                        if (!searchValueTeams.trim()) {
                            alert('Por favor, ingrese un nombre para buscar.');
                            return;
                        }

                        const BASE_IMAGE_URL = '/storage/escudos/';

                        $.ajax({
                            url: '/entrenador/equipos/buscar',
                            type: 'GET',
                            data: {
                                nombre: searchValueTeams
                            },
                            success: function (equipos) {
                                const equiposContainer = $('#teamsTable tbody');
                                equiposContainer.empty();

                                if (Array.isArray(equipos) && equipos.length > 0) {
                                    equipos.forEach(function (equipo) {
                                        const row = $(`
                                        <tr>
                                            <td>${equipo.id}</td>
                                            <td>${equipo.nombre_equipo}</td>
                                            <td><img src="${equipo.escudo_url}" alt="Escudo de ${equipo.nombre_equipo}" style="width: 50px; height: auto;"></td>                                            <td>${equipo.patrocinador_equipo}</td>
                                            <td>${equipo.monto_patrocinador}</td>
                                        </tr>
                                    `);
                                        equiposContainer.append(row);
                                    });

                                    $('#teamsTable').show(); // Mostrar tabla de equipos
                                    $('#downloadPdfButtonTeams').show(); // Mostrar botón de PDF
                                } else {
                                    alert('No se encontraron equipos.');
                                }
                            },
                            error: function () {
                                alert('Ocurrió un error al buscar los equipos.');
                            }
                        });
                    });

                    // Evento para descargar PDF de equipos
                    $('#downloadPdfButtonTeams').off('click').on('click', function () {
                        const searchValueTeams = $('#searchInputTeams').val();

                        if (!searchValueTeams.trim()) {
                            alert('Por favor, ingrese un nombre para generar el PDF.');
                            return;
                        }

                        window.location.href = '/generar-pdf-equipo?nombre=' + searchValueTeams;
                    });
                } // TORNEOS
                else if (selectedOption === "torneo") {
                    $('#searchSectionTournament').show();
                    $('#searchButtonTournament').off('click').on('click', function () {
                        const searchValueTournament = $('#searchInputTournament').val();

                        if (!searchValueTournament.trim()) {
                            alert('Por favor, ingrese un nombre para buscar.');
                            return;
                        }

                        $.ajax({
                            url: '/entrenador/torneo/buscar',
                            type: 'GET',
                            data: {
                                nombre: searchValueTournament
                            },
                            success: function (torneos) {
                                const torneosContainer = $('#tournamentTable tbody');
                                torneosContainer.empty();

                                if (Array.isArray(torneos) && torneos.length > 0) {
                                    torneos.forEach(function (torneo) {
                                        const row = $(`
                                        <tr>
                                            <td>${torneo.id}</td>
                                            <td>${torneo.nombre_torneo}</td>
                                            <td>${torneo.numero_equipos}</td>
                                            <td>${torneo.patrocinador_torneo}</td>
                                            <td>${torneo.monto_patrocinador}</td>
                                        </tr>
                                    `);
                                        torneosContainer.append(row);
                                    });

                                    $('#tournamentTable').show(); // Mostrar tabla de torneo
                                    $('#downloadPdfButtonTournament').show(); // Mostrar botón de PDF
                                } else {
                                    alert('No se encontraron torneos.');
                                }
                            },
                            error: function () {
                                alert('Ocurrió un error al buscar los torneos.');
                            }
                        });
                    });

                    // Evento para descargar PDF de torneos
                    $('#downloadPdfButtonTournament').off('click').on('click', function () {
                        const searchValueTournament = $('#searchInputTournament').val();

                        if (!searchValueTournament.trim()) {
                            alert('Por favor, ingrese un nombre para generar el PDF.');
                            return;
                        }

                        window.location.href = '/generar-pdf-torneo?nombre=' + searchValueTournament;
                    });
                }
                else {
                    // Ocultar todas las secciones si no se selecciona nada o "Seleccione una opción"
                    $('#searchSectionPlayers, #playersTable').hide();
                    $(' #searchSectionFacilities, #FacilitiesTable').hide();
                    $(' #searchSectionTeams, #teamsTable').hide();
                    $(' #searchSectionTournament, #tournamentTable').hide();

                }
            });
        });
    </script>


</div>
</body>
</html>
@endsection
