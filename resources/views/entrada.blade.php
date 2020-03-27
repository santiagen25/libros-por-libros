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
                        <img src="{{asset('images\libroNoPortada.jpg')}}" class="rounded img-fluid" alt="Foto de Portada">
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
                    <div class="row mr-2">
                        <div class="col-md-3">
                            <label class="h4">
                                Descripcion:
                            </label>
                        </div>
                        <div class="pt-1 col-md-8">
                            <p>
                                {{ $libro->Descripcion }}
                            </p>
                        </div>
                    </div>
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
                                <div class="col-md-2">
                                    <p class="h5">
                                        Titulo de tu valoración:
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <input class="inputEstandar" name="titulo" placeholder="Titulo..." type="text">
                                </div>
                            </div>
                            {!! $errors->first('titulo','<div class="mb-5 row ml-1"><div class="text-danger">:message</div></div>') !!}
                            <div class="mb-3 row">
                                <div class="col-md-2">
                                    <p class="h5">
                                        Puntuacion del 0 al 10:
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <input class="inputEstandar" name="puntuacion" placeholder="5" type="text">
                                </div>
                            </div>
                            {!! $errors->first('puntuacion','<div class="mb-5 row ml-1"><div class="text-danger">:message</div></div>') !!}
                            <div class="mb-3 row">
                                <div class="col-md-2">
                                    <p class="h5">
                                        Comentario sobre el libro:
                                    </p>
                                    </div>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="comentario" rows="5" placeholder="Escribe aqui un comentario sobre el libro..."></textarea>
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
                            <div class="col-md-4 mb-2">
                                <div>
                                    Titulo: 
                                </div>
                                <div>
                                    {{ $valoracion->Titulo}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    Puntuacion: 
                                </div>
                                <div>
                                    {{ $valoracion->Puntuacion}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    Usuario: 
                                </div>
                                <div>
                                    <a href="{{ asset('/usuario/'.$valoracion->IDUsuarioFK) }}">
                                        {{ DB::table('usuario')->where('IDUsuario','=',$valoracion->IDUsuarioFK)->first()->Nombre}}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2 ml-2">
                            <div>
                                Comentario: 
                            </div>
                            <div>
                                {{ $valoracion->Comentario }}
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center mt-3">
                            <input class="botonSec col-md-2" value="¡Me gusta!" type="button">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection