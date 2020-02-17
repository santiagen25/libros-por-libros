<html>
    <header>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
        <link rel="icon" href="images\icons\WebTab.png" type="image/svg">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    </header>
    <body>
        @yield('header')
        <div class="contenido">
            @yield('content')
        </div>

        <footer>
            <div class="row m-4">
                <div class="col-md-2">
                    <div class="mb-2">
                        <a href="">Contactanos</a>
                    </div>
                    <div class="">
                        <a href="">FAQ</a>
                    </div>
                </div>
                <div class="offset-md-7 col-md-3">
                    <div class="container">
                        <div class="row">
                            <p>Made by Santiago Torrabadella Ferrer</p>
                        </div>
                        <div class="row">
                            <p>2020 Libros Por Libros, Inc.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>