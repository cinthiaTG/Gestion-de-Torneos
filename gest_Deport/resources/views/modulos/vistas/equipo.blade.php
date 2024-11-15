@extends('layouts.plantilla')
@section('styles')
<link rel="stylesheet" href="{{ asset('torneo.css') }}">
@endsection
@section('content')
<section class="content">
    <h2>Hola @Nombre del usuario</h2>
    <h3 class="title">Equipos | Liga MX</h3>
    
    <br>
    <div class="match-card">
        <div class="team-card">
            <div class="team">
                <img src="{{ asset('img/equip1.png') }}" alt="Equipo 1">
                <div class="team-info">
                    <p>América</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>Necaxa</p>
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
                    <p>Atlas</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>Pachuca</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>Atlético de San Luis</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>Puebla</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>Cruz Azul</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>Pumas UNAM</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>FC Juarez</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>Querétaro</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>Guadalajara</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>Santos</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>León</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>Tigres UANL</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>Mazatlán FC</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>Tijuana</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>Monterrey</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
                    <p>Toluca</p>
                    <div class="links">
                        <p class="link"><a href="#">Calendario</a></p>
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
