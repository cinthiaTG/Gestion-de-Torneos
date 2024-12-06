<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Torneos</title>
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
<h1>Resultado de Torneos</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre de Torneo</th>
        <th>Numero de Equipos</th>
        <th>Patrocinador</th>
        <th>Monto del Patrocinador</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($torneos as $torneo)
        <tr>
            <td>{{ $torneo->id }}</td>
            <td>{{ $torneo->nombre_torneo }}</td>
            <td>{{ $torneo->numero_equipos }}</td>
            <td>{{ $torneo->patrocinador_torneo }}</td>
            <td>{{ $torneo->monto_patrocinador}}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No se encontraron instalaciones.</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
