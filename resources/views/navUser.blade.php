@section('header')
<script src="{{ asset('js/navUser.js') }}"></script>

<nav class="navbar navbar-expand-lg navegacion">
    <a class="navbar-brand" href="{{asset('inicio')}}">Libros por Libros <img src="{{asset('images\icons\WebTabW.png')}}" alt="mainIcon"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <div class="container" >
            <i class="material-icons md-light md-48">menu</i>
        </div>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{asset('inicio')}}">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{asset('biblioteca')}}">Mis Libros</a>
            </li>
            @php
                if(session_status() == PHP_SESSION_NONE) session_start();
                if($_SESSION["admin"]==1) echo "<li class='nav-item'><a class='nav-link' href=".asset('listado').">Listar Usuarios</a></li>";
            @endphp
        </ul>
        <form action="{{asset('resultados/')}}" class="form-inline my-2 my-lg-0" method="GET">
            <input class="form-control mr-sm-2" name="buscador" type="search" placeholder="Buscar libro..." aria-label="Search">
            <button class="botonEstandar form-control my-2 my-sm-0" type="submit">Buscar</button>
        </form>

        <div class="btn-group">
            <button class="" type="button" style="background-color:transparent; border-color:transparent;" data-toggle="dropdown"><img src="{{asset('images\default-profile.png')}}" alt="fotoPerfil" class="avatar"></button>
            <div class="dropdown-menu dropdown-menu-right" id="desplegableNabBar">
                <form action="{{asset('configuracion')}}" method="POST">
                    @csrf
                    <button class="dropdown-item" name="configuracion" type="submit">Configuración</button>
                </form>
                <form method="POST" action="{{asset('login')}}">
                    @csrf
                    <button class="dropdown-item" name="cerrarSesion" type="submit">Cerrar sesión</button>
                </form>
            </div>
        </div>

    </div>
</nav>

@endsection