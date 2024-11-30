@extends('layouts.dashboard')

@section('content')
    <h1>Editar Usuario</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('admin.update', $users->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Esto indica que será una actualización -->

        <!-- Campo para el nombre -->
        <div>
            <label for="name">Nombre del Usuario:</label>
            <input type="text" id="name" name="name" value="{{ $users->name }}" required>
        </div>

        <!-- Campo para el email -->
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $users->email }}" required>
        </div>

        <!-- Campo para el rol -->
        <div>
            <label for="rol_id">Rol:</label>
            <input type="number" id="rol_id" name="rol_id" value="{{ $users->rol_id }}" required>
        </div>

        <button type="submit">Actualizar</button>
    </form>
@endsection
