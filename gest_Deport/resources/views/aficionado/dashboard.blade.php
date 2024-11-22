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

    <div id="searchSection" class="mb-3" style="display: none;">
        <label for="searchInput" class="form-label">Buscar por nombre</label>
        <div class="input-group">
            <input type="text" id="searchInput" class="form-control" placeholder="Ingrese el nombre">
            <button id="searchButton" class="btn btn-primary">Buscar</button>
        </div>
    </div>

    <br>
    <br>

    <h2>Resultados de la Búsqueda</h2>
    <table class="table table-striped" id="playersTable">
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

    <button id="downloadPdfButton" class="btn btn-success" style="display:none;">Generar PDF</button>

    <script>
        $(document).ready(function () {
            $('#addOption').change(function () {
                const selectedOption = $(this).val();

                if (selectedOption === "jugador") {
                    $('#searchSection').show();
                } else {
                    $('#searchSection').hide();
                }
            });

            $('#searchButton').click(function () {
                const searchValue = $('#searchInput').val();

                if (!searchValue.trim()) {
                    alert('Por favor, ingrese un nombre para buscar.');
                    return;
                }

                $.ajax({
                    url: '/entrenador/jugadores/buscar',
                    type: 'GET',
                    data: {
                        nombre: searchValue
                    },
                    success: function (jugadores) {
                        const jugadoresContainer = $('#playersTable tbody');
                        jugadoresContainer.empty();

                        if (Array.isArray(jugadores) && jugadores.length > 0) {
                            jugadores.forEach(function (jugador) {
                                const idEquipo = jugador.id_equipo;

                                // Crear fila con datos básicos
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

                                // Realizar otra consulta para obtener el nombre del equipo
                                $.ajax({
                                    url: '/entrenador/equipos/buscar', // Nueva ruta para buscar equipos
                                    type: 'GET',
                                    data: {
                                        id: idEquipo // Usa idEquipo en lugar de id_equipo
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

                            // Mostrar el botón de descarga de PDF
                            $('#downloadPdfButton').show();
                        } else {
                            alert('No se encontraron jugadores.');
                        }
                    },
                    error: function () {
                        alert('Ocurrió un error al buscar los jugadores.');
                    }
                });
            });

            // Evento para descargar el PDF
            $('#downloadPdfButton').click(function () {
                const searchValue = $('#searchInput').val();

                if (!searchValue.trim()) {
                    alert('Por favor, ingrese un nombre para generar el PDF.');
                    return;
                }

                // Redirigir al controlador para generar el PDF
                window.location.href = '/generar-pdf?nombre=' + searchValue;
            });
        });
    </script>
</div>
</body>
</html>
@endsection
