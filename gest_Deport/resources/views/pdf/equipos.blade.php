<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Equipos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Resultado de Equipos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Patrocinador</th>
                <th>Monto del Patrocinador</th>
                {{-- <th>Partidos Jugados</th>
                <th>Victorias</th>
                <th>Empates</th>
                <th>Derrotas</th> --}}
            </tr>
        </thead>
        <tbody>
            @forelse ($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->id }}</td>
                    <td>{{ $equipo->nombre_equipo }}</td>
                    <td>{{ $equipo->patrocinador_equipo }}</td>
                    <td>{{ $equipo->monto_patrocinador }}</td>
                    {{-- <td>{{$equipo->partidos_jugados}}</td>
        <td>{{$equipo->victorias}}</td>
        <td>{{$equipo->empates}}</td>
        <td>{{$equipo->derrotas}}</td> --}}
                </tr>
            @empty
                <tr>
                    <td colspan="9">No se encontraron instalaciones.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
