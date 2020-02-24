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
                    <div class="row">
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

                @php
                    if(session_status() == PHP_SESSION_NONE) session_start();
                    $id = DB::table('usuario')->where('Email','=',$_SESSION["email"])->first()->IDUsuario;
                @endphp

                @if(sizeof(DB::table('valoracion')->where('IDUsuarioFK','=',$id)->where('IDLibroFK','=',$libro->IDLibro)->get()) == 0)
                    <div class="enmarcarNoticia p-4 mb-5">
                        <div class="mb-3 row">
                            <div class="col-md-2">
                                <p class="h5">
                                    Titulo de tu valoración:
                                </p>
                            </div>
                            <div class="col-md-4">
                                <input class="inputEstandar" placeholder="Titulo..." type="text">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-2">
                                <p class="h5">
                                    Puntuacion del 0 al 10:
                                </p>
                            </div>
                            <div class="col-md-4">
                                <input class="inputEstandar" placeholder="5" type="text">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-2">
                                <p class="h5">
                                    Comentario sobre el libro:
                                </p>
                                </div>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="5" placeholder="Escribe aqui un comentario sobre el libro..."></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input class="botonEstandar form-control col-md-4" type="submit" value="Publicar Valoración">
                        </div>
                    </div>
                @else
                    <div class="enmarcarNoticia p-4 mb-5">
                        <div class="mb-3 row">
                            <div class="col-md-2">
                                <p class="h5">
                                    Titulo de tu valoración:
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p>

                                </p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-2">
                                <p class="h5">
                                    Puntuacion del 0 al 10:
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p>
                                    
                                </p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-2">
                                <p class="h5">
                                    Comentario sobre el libro:
                                </p>
                                </div>
                            <div class="col-md-10">
                                <textarea class="form-control" placeholder="Escribe aqui un comentario sobre el libro..." readonly rows="5"></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input class="botonEstandar form-control col-md-4" type="submit" value="Editar valoracion">
                        </div>
                    </div>
                @endif

                @if(sizeof($valoraciones)==0)
                    <div class="enmarcarNoticia mt-3 p-4">
                        <div class="row d-flex justify-content-center">
                            <p class="h5">
                                Parece que aún no hay ninguna valoración de ningún usuario para este libro
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
                                    @if(DB::table('usuario')->where('Email','=',$_SESSION["email"])->first()->IDUsuario == $valoracion->IDUsuarioFK)
                                        <a href="{{ asset('/configuracion') }}">
                                            {{ DB::table('usuario')->where('IDUsuario','=',$valoracion->IDUsuarioFK)->first()->Nombre}}
                                        </a>
                                    @else
                                        <a href="{{ asset('/usuario/'.$valoracion->IDUsuarioFK) }}">
                                            {{ DB::table('usuario')->where('IDUsuario','=',$valoracion->IDUsuarioFK)->first()->Nombre}}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                Comentario: 
                            </div>
                            <div>
                                {{ $valoracion->Comentario }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection