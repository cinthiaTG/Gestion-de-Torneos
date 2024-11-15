@extends('layouts.plantilla')
@section('styles')
<link rel="stylesheet" href="{{ asset('perfila.css') }}">
@endsection
@section('content')
<section class="content">
    <h3 class="title">Perfil de @Usuario</h3>
    
    <div class="profile-content">
        <img class="profile-picture" src="{{ asset('img/profile.png') }}" alt="Foto de Perfil">
        <ul class="profile-details">
            <li>Nombre:</li>
            <li>Fecha de nacimiento:</li>
            <li>Género:</li>
            <li>Teléfono:</li>
            <li>Edad:</li>
            <li>Correo electrónico:</li>
            <li>Rol (Jugador, Entrenador, Árbitro, Fanático):</li>
        </ul>
    </div>

</section>
</div>
</main>
<footer>
<div class="container">
<p>&copy; 2024</p>
</div>
</footer>
@endsection
