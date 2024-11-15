@extends('layouts.plantilla')

@section('styles')
    <link rel="stylesheet" href="{{ asset('/Css/enVivo.css') }}">
@endsection

@section('content')

    <div class="user-greeting">
        <h2>Hola, @Nombre del usuario</h2>
    </div>

    <!-- video en vivo -->
    <div class="live-stream">
        <h3>En Vivo</h3>
        <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/HHCRtTSfC_8" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>
        </div>
    </div>

    <!-- sseccion de comentarios -->
    <div class="comments-section">
        <h3>Comentarios</h3>

        <!-- mostrar comentarios -->
        <div class="comments-list">
            {{-- Ejemplo de un comentario --}}
            <div class="comment">
                <strong>user1:</strong>
                <p>Este es un comentario de ejemplo pq aun no se conecta a nada.</p>
            </div>
        </div>

        <!-- agg comentario -->
        <form action="" method="POST" class="comment-form">
            @csrf
            <label for="comment">Escribe tu comentario:</label>
            <textarea id="comment" name="comment" rows="4" required></textarea>
            <button type="button">Enviar</button>
        </form>
    </div>

@endsection
