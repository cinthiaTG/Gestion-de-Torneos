@extends('layouts.plantilla')
@section('styles')
<link rel="stylesheet" href="{{ asset('torneo.css') }}">
@endsection
@section('content')
<section class="content">
    <h2>Hola @Nombre del usuario</h2>
    <h3 class="title">Ligas de Futbol y Torneos</h3>
    
    <h3>Lo Mejor</h3>
    <div class="match-card">
        <div class="team-card">
            <div class="team">
                <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
                <div class="team-info">
                    <p>Liga MX</p>
                    <div class="links">
                        <p class="link"><a href="{{ route('vistas.equipo') }}">Equipo</a></p>
                        <p class="link">|</p>
                        <p class="link"><a href="#">Estadísticas</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator"></div>
        <div class="team-card">
            <div class="team">
                <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
                <div class="team-info">
                    <p>UEFA Champions League</p>
                    <div class="links">
                        <p class="link"><a href="#">Equipo</a></p>
                        <p class="link">|</p>
                        <p class="link"><a href="#">Estadísticas</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="match-card">
        <div class="team-card">
            <div class="team">
                <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
                <div class="team-info">
                    <p>Liga MX</p>
                    <div class="links">
                        <p class="link"><a href="#">Equipo</a></p>
                        <p class="link">|</p>
                        <p class="link"><a href="#">Estadísticas</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator"></div>
        <div class="team-card">
            <div class="team">
                <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
                <div class="team-info">
                    <p>UEFA Champions League</p>
                    <div class="links">
                        <p class="link"><a href="#">Equipo</a></p>
                        <p class="link">|</p>
                        <p class="link"><a href="#">Estadísticas</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="match-card">
        <div class="team-card">
            <div class="team">
                <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
                <div class="team-info">
                    <p>Liga MX</p>
                    <div class="links">
                        <p class="link"><a href="#">Equipo</a></p>
                        <p class="link">|</p>
                        <p class="link"><a href="#">Estadísticas</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator"></div>
        <div class="team-card">
            <div class="team">
                <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
                <div class="team-info">
                    <p>UEFA Champions League</p>
                    <div class="links">
                        <p class="link"><a href="#">Equipo</a></p>
                        <p class="link">|</p>
                        <p class="link"><a href="#">Estadísticas</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="match-card">
        <div class="team-card">
            <div class="team">
                <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
                <div class="team-info">
                    <p>Liga MX</p>
                    <div class="links">
                        <p class="link"><a href="#">Equipo</a></p>
                        <p class="link">|</p>
                        <p class="link"><a href="#">Estadísticas</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator"></div>
        <div class="team-card">
            <div class="team">
                <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
                <div class="team-info">
                    <p>UEFA Champions League</p>
                    <div class="links">
                        <p class="link"><a href="#">Equipo</a></p>
                        <p class="link">|</p>
                        <p class="link"><a href="#">Estadísticas</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3>México y CONCACAF</h3>
    <div class="match-card">
        <div class="team-card">
            <div class="team">
                <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
                <div class="team-info">
                    <p>Equipo 1</p>
                    <div class="links">
                        <p class="link"><a href="#">Equipo</a></p>
                        <p class="link">|</p>
                        <p class="link"><a href="#">Estadísticas</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator"></div>
        <div class="team-card">
            <div class="team">
                <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
                <div class="team-info">
                    <p>Equipo 1</p>
                    <div class="links">
                        <p class="link"><a href="#">Equipo</a></p>
                        <p class="link">|</p>
                        <p class="link"><a href="#">Estadísticas</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="match-card">
        <div class="team-card">
            <div class="team">
                <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
                <div class="team-info">
                    <p>Liga MX</p>
                    <div class="links">
                        <p class="link"><a href="#">Equipo</a></p>
                        <p class="link">|</p>
                        <p class="link"><a href="#">Estadísticas</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator"></div>
        <div class="team-card">
            <div class="team">
                <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
                <div class="team-info">
                    <p>UEFA Champions League</p>
                    <div class="links">
                        <p class="link"><a href="#">Equipo</a></p>
                        <p class="link">|</p>
                        <p class="link"><a href="#">Estadísticas</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="match-card">
        <div class="team-card">
            <div class="team">
                <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
                <div class="team-info">
                    <p>Liga MX</p>
                    <div class="links">
                        <p class="link"><a href="#">Equipo</a></p>
                        <p class="link">|</p>
                        <p class="link"><a href="#">Estadísticas</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator"></div>
        <div class="team-card">
            <div class="team">
                <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
                <div class="team-info">
                    <p>UEFA Champions League</p>
                    <div class="links">
                        <p class="link"><a href="#">Equipo</a></p>
                        <p class="link">|</p>
                        <p class="link"><a href="#">Estadísticas</a></p>
                    </div>
                </div>
            </div>
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
