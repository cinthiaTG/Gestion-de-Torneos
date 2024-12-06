<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Instalaciones</title>
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
<h1>Resultado de Instalaciones</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre de Instalacion</th>
        <th>Ubicacion</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($instalaciones as $instalacion)
        <tr>
            <td>{{ $instalacion->id }}</td>
            <td>{{ $instalacion->nombre_instalacion }}</td>
            <td>{{ $instalacion->ubicacion }}</td>
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
