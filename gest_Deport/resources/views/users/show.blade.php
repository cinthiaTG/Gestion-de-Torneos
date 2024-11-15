<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Detalles del Usuario</h1>
    
        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Nombre:</strong> {{ $user->nombre }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Rol:</strong> {{ $user->rol_id }}</p>
        <p><strong>Activo:</strong> {{ $user->activo ? 'Sí' : 'No' }}</p>
    
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </div>
</body>
</html>