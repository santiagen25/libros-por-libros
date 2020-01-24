@section('header')
<script src="{{ asset('js/navUser.js') }}"></script>

<!--
    <nav class="navegacion navbar navbar-expand-lg m-3">
        <div class="collapse navbar-collapse">
            <div class="col">
                <a href="inicio">
                    Inicio
                </a>
            </div>
            <div class="col">
                <a href="/">
                    Logout
                </a>
            </div>
            <div class="col mt-3">
                <form class="form-inline">
                    <div class="row">
                        <div>
                            <input class="inputNav" type="text" placeholder="Buscar">
                        </div>
                        <div>
                            <input class="botonEstandar" type="submit" value="Buscar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col mt-3">
                <p>pic</p>
            </div>
        </div>
    </nav>
-->
<nav class="navbar navbar-expand-lg navegacion">
    <a class="navbar-brand" href="#">Libros por Libros [pic]</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon resumenNavBar"></span>
        <div class="container" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Mis Libros</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
@endsection