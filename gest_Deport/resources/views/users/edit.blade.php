<!-- resources/views/users/edit.blade.php -->
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
        <h1>Editar Usuario</h1>
    
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $user->nombre }}" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
    
            <div class="form-group">
                <label for="rol_id">Rol</label>
                <input type="number" name="rol_id" class="form-control" value="{{ $user->rol_id }}" required>
            </div>
    
            <div class="form-group">
                <label for="activo">Activo</label>
                <input type="checkbox" name="activo" value="1" {{ $user->activo ? 'checked' : '1' }}>
            </div>
    
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
