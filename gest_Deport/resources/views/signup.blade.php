<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="{{ asset('Css/signup.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <div class="main-text">Sign Up</div>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <label class="input-label" for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="input-box" required>

                <label class="input-label" for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="input-box" required>

                <label class="input-label" for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="input-box" required>

                <label class="input-label" for="password_confirm">Confirmación de Contraseña</label>
                <input type="password" id="password_confirm" name="password_confirm" class="input-box" required>

                <label class="input-label" for="rol">Rol</label>
                <select id="rol" name="rol_id" class="input-box" required>
                    <option value="1">Aficionado</option>
                    <option value="2">Entrenador</option>
                    <option value="3">Jugador</option>
                    <option value="4">Árbitro</option>
                </select>

                <div class="terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms" class="remember-label">Estoy de acuerdo con los</label>
                    <a href="#" class="register-link">términos y condiciones</a>.
                </div>

                <button type="submit" class="btn btn-primary btn-block login-button">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
