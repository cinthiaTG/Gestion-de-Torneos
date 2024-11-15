@extends('layouts.plantilla')
@section('styles')
<link rel="stylesheet" href="{{ asset('style.css') }}">

@endsection
@section('content')
<section class="content">
    <h2>Hola @Nombre del usuario</h2>
    <h3>Ultimas Noticias</h3>
    
    <div>
        <img src="{{ asset('img/noticia.png') }}" alt="Imagen noticia">

    </div>
    <h3>Resultados de Partidos</h3>
    <div class="news-card">
        <div class="team">
            <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
            <p>Equipo 1</p>
        </div>
        <div class="score">
            <p>0-0</p>
        </div>
        <div class="team">
            <img src="{{ asset('img/equip1.png') }}" alt="Equipo 2">
            <p>Equipo 2</p>
        </div>
    </div>
    <div class="match-card">
        <div class="team">
            <img src="{{ asset('img/equip1.png') }}" alt=" Equipo 1">
            <p>Equipo 1</p>
        </div>
        <div class="score">
            <p>0-0</p>
        </div>
        <div class="team">
            <img src="{{ asset('img/equip1.png') }}" alt="Equipo 2">
            <p>Equipo 2</p>
        </div>
    </div>
    <h3>Próximos Partidos</h3>
    <div class="match-card">
        <div class="team">
            <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
            <p>Equipo 1</p>
        </div>
        <div class="score">
            <p>0-0</p>
        </div>
        <div class="team">
            <img src="{{ asset('img/equip1.png') }}" alt="Equipo 2">
            <p>Equipo 2</p>
        </div>
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