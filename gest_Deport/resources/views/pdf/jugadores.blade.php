<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Jugadores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>Resultado de Jugadores</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th>ID de Equipo</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($jugadores as $jugador)
        <tr>
            <td>{{ $jugador->id }}</td>
            <td>{{ $jugador->nombre }}</td>
            <td>{{ $jugador->edad }}</td>
            <td>{{ $jugador->id_equipo }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No se encontraron jugadores.</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
