@extends('template')
@include('navUser')

@section('title')
    {{ $libro->Nombre }}
@endsection

@section('header')

@endsection

@section('content')
    <div class="">
        <div class="d-flex justify-content-center mb-5">
            <div class="enmarcarCuadrado container">
                <div class="row m-4">
                    <div class="mr-4 col-md-3">
                        {{-- <img src="{{asset('images\libroNoPortada.jpg')}}" class="rounded img-fluid" alt="Foto de Portada"> --}}
                        @php
                            if(session_status() == PHP_SESSION_NONE) session_start();
                            if(file_exists('images/imagenesLibros/libro_'.$libro->IDLibro.".jpg")) echo "<img src=\"".asset('images/imagenesLibros/libro_'.$libro->IDLibro.'.jpg')."\" class=\"rounded img-fluid fotoPortadaEntrada\" alt=\"Foto de Portada\">";
                            else if(file_exists('images/imagenesLibros/libro_'.$libro->IDLibro.".jpeg")) echo "<img src=\"".asset('images/imagenesLibros/libro_'.$libro->IDLibro.'.jpeg')."\" class=\"rounded img-fluid fotoPortadaEntrada\" alt=\"Foto de Portada\">";
                            else if(file_exists('images/imagenesLibros/libro_'.$libro->IDLibro.".png")) echo "<img src=\"".asset('images/imagenesLibros/libro_'.$libro->IDLibro.'.png')."\" class=\"rounded img-fluid fotoPortadaEntrada\" alt=\"Foto de Portada\">";
                            else if(file_exists('images/imagenesLibros/libro_'.$libro->IDLibro.".gif")) echo "<img src=\"".asset('images/imagenesLibros/libro_'.$libro->IDLibro.'.gif')."\" class=\"rounded img-fluid fotoPortadaEntrada\" alt=\"Foto de Poratada\">";
                            else echo "<img src=\"".asset('images/imagenesLibros/libroPortadaDefault.png')."\" class=\"rounded img-fluid fotoPortadaEntrada\" alt=\"Foto de Perfil\">";
                        @endphp
                    </div>

                    <div class="col-md-8">
                        <div class="row mb-4 mt-2">
                            <div class="col-md-5">
                                <label class="h4">
                                    Nombre:
                                </label>
                            </div>
                            <div class="pt-1 col-md-7">
                                <p>
                                    {{ $libro->Nombre }}
                                </p>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-5">
                                <label class="h4">
                                    Autor:
                                </label>
                            </div>
                            <div class="pt-1 col-md-7">
                                <p>
                                    {{ $libro->Autor }}
                                </p>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-5">
                                <label class="h4">
                                    ISBN:
                                </label>
                            </div>
                            <div class="pt-1 col-md-7">
                                <p>
                                    {{ $libro->ISBN }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <label class="h4">
                                    Género:
                                </label>
                            </div>
                            <div class="pt-1 col-md-7">
                                <p>
                                    {{ $libro->Genero }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row col-md-12 m-4">
                    <div class="row mr-2 col-md-12">
                        <div class="col-md-3">
                            <div class="row col-md-12">
                                <label class="h4">
                                    Descripcion:
                                </label>
                            </div>
                        </div>
                        <div class="pt-1 col-md-8">
                            <p>
                                {{ $libro->Descripcion }}
                            </p>
                        </div>
                    </div>
                </div>

                <!--Puntuacion general del libro-->
                <div class="row col-md-12 m-4">
                    <div class="col-md-3">
                        <label class="h4">
                            Puntuación General:
                        </label>
                    </div>
                    <div class="col-md-1">
                        @if($mediaPuntuacion == -1)
                            <p>
                                N/A
                            </p>
                        @else
                            <p>
                                @php
                                    $mediaPuntuacion = number_format((float)$mediaPuntuacion, 2, ',', '');
                                @endphp
                                {{ $mediaPuntuacion }}
                            </p>
                        @endif
                    </div>
                    <div class="col-md-7">
                        @for($i = 0; $i < 10; $i++)
                            @if($i<$mediaPuntuacion)
                                <span class="material-icons">
                                    grade
                                </span>
                            @else
                                <span class="material-icons-outlined">
                                    grade
                                </span>
                            @endif
                        @endfor
                    </div>
                </div>

                @php
                    if(session_status() == PHP_SESSION_NONE) session_start();
                @endphp
                @if($_SESSION["admin"]==1)
                    <form class="d-flex justify-content-center" action="{{ asset('/editar-libro/'.$libro->IDLibro) }}" method="GET">
                        <input class="botonEditar col-md-4 my-5 py-2" type="submit" value="Editar">
                    </form>
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="enmarcarCuadrado container">
                <div class="row col-md-12 m-4">
                    <form action="/libro/{{$libro->IDLibro}}" method="POST" class="row col-md-12 mt-5 d-flex justify-content-center">
                        @csrf
                        <div class="col-md-3">
                            <label class="mx-3"><b  class="h4">Relacion</b></label>
                        </div>
                        <div class="col-md-3">
                            <select class="select p-2" id="relacion" name="relacion">
                                @php
                                    if($relacion==NULL) echo "<option selected>Sin Relacion</option>";
                                    else echo "<option>Sin Relacion</option>";
                                @endphp
                                @php
                                    if($relacion!=NULL && $relacion->Relacion==1) echo "<option selected>Quiero Leerlo</option>";
                                    else echo "<option>Quiero Leerlo</option>";
                                @endphp
                                @php
                                    if($relacion!=NULL && $relacion->Relacion==2) echo "<option selected>Leyendo</option>";
                                    else echo "<option>Leyendo</option>";
                                @endphp
                                @php
                                    if($relacion!=NULL && $relacion->Relacion==3) echo "<option selected>Leido</option>";
                                    else echo "<option>Leido</option>";
                                @endphp
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="mr-3" for="favorito"><b>Favorito</b></label>
                            @if($relacion!=NULL && $relacion->Favorito==1)
                                <input id="favorito" name="favorito" type="checkbox" checked>
                            @else
                                <input id="favorito" name="favorito" type="checkbox">
                            @endif
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="botonRelacion" class="botonEstandar p-2" value="Guardar">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Aqui empiezan las valoraciones-->
        <div class="d-flex justify-content-center mt-5">
            <div class="enmarcarCuadrado container">
                <div class="d-flex justify-content-center my-5">
                    <h2>
                        Valoraciones
                    </h2>
                </div>

                @if(sizeof(DB::table('valoracion')->where('IDUsuarioFK','=',$usuario->IDUsuario)->where('IDLibroFK','=',$libro->IDLibro)->get()) == 0)
                    <form action="{{ asset('/libro/'.$libro->IDLibro) }}" method="POST">
                        @csrf
                        <div class="enmarcarNoticia p-4 mb-5">
                            <div class="mb-3 row">
                                <div class="col-md-2 px-1">
                                    <p class="h5">
                                        Titulo de tu valoración:
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <input class="inputEstandar" name="titulo" placeholder="Titulo..." type="text" value="{!! $errors->first('realTitulo',':message') !!}">
                                </div>
                            </div>
                            {!! $errors->first('titulo','<div class="mb-5 row ml-1"><div class="text-danger">:message</div></div>') !!}
                            <div class="mb-3 row">
                                <div class="col-md-2 px-1">
                                    <p class="h5">
                                        Puntuacion del 0 al 10:
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <input class="inputEstandar" name="puntuacion" placeholder="5" type="text" value="{!! $errors->first('realPuntuacion',':message') !!}">
                                </div>
                            </div>
                            {!! $errors->first('puntuacion','<div class="mb-5 row ml-1"><div class="text-danger">:message</div></div>') !!}
                            <div class="mb-3 row">
                                <div class="col-md-2 px-1">
                                    <p class="h5">
                                        Comentario sobre el libro:
                                    </p>
                                    </div>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="comentario" rows="5" placeholder="Escribe aqui un comentario sobre el libro...">{!! $errors->first('realComentario',':message') !!}</textarea>
                                </div>
                            </div>
                            {!! $errors->first('comentario','<div class="row ml-1"><div class="text-danger">:message</div></div>') !!}
                            <div class="d-flex justify-content-center">
                                <input class="botonEditar form-control col-md-4" type="submit" value="Publicar Valoración" name="publicarValoracion">
                            </div>
                        </div>
                    </form>
                @else
                <!--Tu valoracion existe y puede ser modificada-->
                    @php
                        if(session_status() == PHP_SESSION_NONE) session_start();
                        $mivaloracion = DB::table('valoracion')->where('IDUsuarioFK','=',$usuario->IDUsuario)->where('IDLibroFK','=',$libro->IDLibro)->first();
                    @endphp

                    <div class="enmarcarNoticia p-4 mb-5">
                        <div class="mb-3 row">
                            <div class="col-md-2">
                                <p class="h5">
                                    Titulo de tu valoración:
                                </p>
                            </div>
                            <div class="col-md-8" id="tituloPadre">
                                <p id="titulo">
                                    {{ $mivaloracion->Titulo }}
                                </p>
                            </div>
                            <div class="col-md-2">
                                <input class="botonEditar" id="botonTitulo" onclick="editarTitulo()" type="button" value="Editar">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-2">
                                <p class="h5">
                                    Puntuacion del 0 al 10:
                                </p>
                            </div>
                            <div class="col-md-8" id="puntuacionPadre">
                                <p id="puntuacion">
                                    {{ $mivaloracion->Puntuacion }}
                                </p>
                            </div>
                            <div class="col-md-2">
                                <input class="botonEditar" id="botonPuntuacion" onclick="editarPuntuacion()" type="button" value="Editar">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-2">
                                <p class="h5">
                                    Comentario sobre el libro:
                                </p>
                            </div>
                            <div class="col-md-8" id="comentarioPadre">
                                <p id="comentario">
                                    {{ $mivaloracion->Comentario }}
                                </p>
                            </div>
                            <div class="col-md-2">
                                <input class="botonEditar" id="botonComentario" onclick="editarComentario()" type="button" value="Editar">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-2">
                                <p class="h5">
                                    Likes Recibidos:
                                </p>
                            </div>
                            <div class="col-md-10" id="tituloPadre">
                                <p id="titulo">
                                    @php
                                        $likesRecibidos = DB::table('usuario_valoracion')->where('IDValoracionFK3','=',$mivaloracion->IDValoracion)->count();
                                    @endphp
                                    {{ $likesRecibidos }}
                                </p>
                            </div>
                        </div>
                        <form method="POST" action="{{ asset('/libro/'.$libro->IDLibro) }}">
                            @csrf
                            <div class="d-flex justify-content-center">
                                <input class="botonEliminar col-md-4" name="eliminarValoracion" type="submit" value="Eliminar valoracion">
                            </div>
                        </form>
                    </div>
                @endif

                @if(sizeof($valoraciones)==0)
                    <div class="enmarcarNoticia mt-3 p-4">
                        <div class="row d-flex justify-content-center">
                            <p class="h5">
                                Parece que aún no hay valoraciones de otros usuarios para este libro
                            </p>
                        </div>
                    </div>
                @endif
                @foreach($valoraciones as $valoracion)
                    <div class="enmarcarNoticia mt-3 p-4">
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <div>
                                    <p class="h6">
                                        Titulo:
                                    </p> 
                                </div>
                                <div>
                                    <p>
                                        {{ $valoracion->Titulo}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <p class="h6">
                                        Puntuacion: 
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        {{ $valoracion->Puntuacion}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <p class="h6">
                                        Usuario:
                                    </p> 
                                </div>
                                <div>
                                    <a href="{{ asset('/usuario/'.$valoracion->IDUsuarioFK) }}">
                                        {{ DB::table('usuario')->where('IDUsuario','=',$valoracion->IDUsuarioFK)->first()->Nombre}}
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <p class="h6">
                                        Likes:
                                    </p>
                                </div>
                                <div>
                                    <p id="likesTotales_{{$valoracion->IDValoracion}}">
                                        @php
                                            if(session_status() == PHP_SESSION_NONE) session_start();
                                            $likes = DB::table('usuario_valoracion')->where('IDValoracionFK3','=',$valoracion->IDValoracion)->get();
                                            $num = 0;
                                            foreach($likes as $like){
                                                $num = $num + 1;
                                            }
                                            echo $num;
                                        @endphp
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2 ml-2">
                            <div class="col-md-2">
                                <p class="h6">
                                    Comentario: 
                                </p>
                            </div>
                            <div class="col-md-10">
                                {{ $valoracion->Comentario }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 d-flex justify-content-center">
                                @if(DB::table('usuario_valoracion')->where('IDValoracionFK3','=',$valoracion->IDValoracion)->where('IDUsuarioFK4','=',$_SESSION["id"])->get()->isEmpty())
                                    <input class="botonSec col-md-4" id="like_{{$valoracion->IDValoracion}}" onclick="meGusta({{$valoracion->IDValoracion}})" value="¡Me Gusta!" type="button">
                                @else
                                    <input class="botonSec col-md-4" id="like_{{$valoracion->IDValoracion}}" onclick="meGusta({{$valoracion->IDValoracion}})" value="No Me Gusta" type="button">
                                @endif
                            </div>
                            @if($_SESSION["admin"]==1)
                                <form method="POST" action="{{ asset('/libro/'.$libro->IDLibro) }}" class="col-md-6 d-flex justify-content-center">
                                    @csrf
                                    <div class="d-flex justify-content-center">
                                        <input class="botonEliminar col-md-12" name="eliminarComentario" type="submit" value="Eliminar comentario">
                                        <input type="hidden" name="id_valoracion" value="{{$valoracion->IDValoracion}}">
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection