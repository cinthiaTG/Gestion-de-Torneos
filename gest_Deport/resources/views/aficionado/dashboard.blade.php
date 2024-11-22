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
            <th>Equipo</th>
        </tr>
        </thead>
        <tbody>
        <!-- Para mostrar los resultados -->
        </tbody>
    </table>

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
        });

        $('#searchButton').click(function () {
            const selectedOption = $('#addOption').val(); // Obtener opción seleccionada
            const searchValue = $('#searchInput').val();  // Obtener valor del buscador

            if (!searchValue.trim()) {
                alert('Por favor, ingrese un nombre para buscar.');
                return;
            }

            alert(`Buscar "${searchValue}" en ${selectedOption}`);

            // Realizar la petición AJAX
            $.ajax({
                url: '/entrenador/jugadores/buscar',
                type: 'GET',
                data: {
                    nombre: searchValue
                },
                success: function (jugadores) {
                    console.log(jugadores);

                    const jugadoresContainer = $('#playersTable tbody');
                    jugadoresContainer.empty();

                    if (Array.isArray(jugadores) && jugadores.length > 0) {
                        jugadores.forEach(function(jugador) {
                            jugadoresContainer.append(`
                            <tr>
                                <td>${jugador.id}</td>
                                <td>${jugador.nombre}</td>
                                <td>${jugador.apellido_paterno}</td>
                                <td>${jugador.apellido_materno}</td>
                                <td>${jugador.edad}</td>
                                <td>${jugador.posicion}</td>
                                <td>${jugador.equipo ? jugador.equipo.nombre : 'No asignado'}</td>
                            </tr>
                        `);
                        });

                    } else {
                        alert('No se encontraron jugadores.');
                    }
                },

            });
        });
    </script>
</div>
</body>
</html>
@endsection
