@section('header')
    <nav class="navegacion navbar navbar-expand-lg m-3">
        <div class="container">
            <div class="col-md-6 row">
                <div class="col-md-2">
                    <a href="inicio">
                        Inicio
                    </a>
                </div>
                <div class="">
                    <a href="">
                        Usuarios
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <a href="/">
                    Logout
                </a>
            </div>
            <div class="col-md-3">
                <form>
                    <div class="row">
                        <div>
                            <input class="inputEstandar" type="search" placeholder="Buscar">
                        </div>
                        <div>
                            <input class="botonEstandar" type="submit" value="Search">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-1">
                <p>pic</p>
            </div>
        </div>
    </nav>
@endsection