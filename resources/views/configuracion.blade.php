@extends('template')
@include('navUser')

@section('title')
    Configuración
@endsection

@section('header')

@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="enmarcarCuadrado container">
            <div class="row m-4">
                <div class="mr-4 col-md-3">
                    <form action="/configuracion" method="POST" enctype="multipart/form-data" class="d-flex justify-content-center row col-md-12">
                        @csrf
                        <div class="d-flex justify-content-center" id="imagenPadre">
                            {{-- <img src="{{asset('images/default-profile.png')}}" class="rounded img-fluid" alt="Foto de Perfil" id="fotoPerfil"> --}}
                            @php
                                if(file_exists('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.".jpg")) echo "<img src=\"".asset('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.'.jpg')."\" class=\"rounded img-fluid\" alt=\"Foto de Perfil\" id=\"fotoPerfil\">";
                                else if(file_exists('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.".jpeg")) echo "<img src=\"".asset('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.'.jpeg')."\" class=\"rounded img-fluid\" alt=\"Foto de Perfil\" id=\"fotoPerfil\">";
                                else if(file_exists('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.".png")) echo "<img src=\"".asset('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.'.png')."\" class=\"rounded img-fluid\" alt=\"Foto de Perfil\" id=\"fotoPerfil\">";
                                else if(file_exists('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.".gif")) echo "<img src=\"".asset('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.'.gif')."\" class=\"rounded img-fluid\" alt=\"Foto de Perfil\" id=\"fotoPerfil\">";
                                else echo "<img src=\"".asset('images/default-profile.png')."\" class=\"rounded img-fluid\" alt=\"Foto de Perfil\" id=\"fotoPerfil\">";
                            @endphp
                        </div>
                        <div class="d-flex justify-content-center mt-3" id="botonImagenPadre">
                            <input class="botonEditar" id="botonImagen" onclick="editarImagen()" type="button" value="Editar">
                        </div>
                    </form>
                    {!! $errors->first('errorImagen','<div class="text-danger d-flex justify-content-center h4">:message</div>') !!}
                </div>

                <div class="col-md-8">
                    <div class="row mb-4 mt-2">
                        <div class="col-md-5">
                            <label class="h4">
                                Nombre:
                            </label>
                        </div>
                        <div class="pt-1 col-md-5" id="nombrePadre">
                            <p id="nombre">
                                {{$usuario->Nombre}}
                            </p>
                        </div>
                        <div class="col-md-2">
                            <input class="botonEditar" id="botonNombre" onclick="editarNombre()" type="button" value="Editar">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-5">
                            <label class="h4">
                                Email:
                            </label>
                        </div>
                        <div class="pt-1 col-md-5" id="emailPadre">
                            <p id="email">
                                {{$usuario->Email}}
                            </p>
                        </div>
                        <div class="col-md-2">
                            <input class="botonEditar" id="botonEmail" onclick="editarEmail()" type="button" value="Editar">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-5">
                            <label class="h4">
                                Fecha de nacimiento:
                            </label>
                        </div>
                        <div class="pt-1 col-md-5" id="nacimientoPadre">
                            <p id="nacimiento">
                                @if($usuario->Nacimiento==null)
                                    N/A
                                @else
                                    @php
                                        echo explode(" ", $usuario->Nacimiento)[0]
                                    @endphp
                                @endif
                            </p>
                        </div>
                        <div class="col-md-2">
                            <input class="botonEditar" id="botonNacimiento" onclick="editarNacimiento()" type="button" value="Editar">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <label class="h4">
                                Contraseña
                            </label>
                        </div>
                        <div class="pt-1 col-md-5" id="passwordPadre">
                            <p id="password">
                                ********
                            </p>
                        </div>
                        <div class="col-md-2">
                            <input class="botonEditar" id="botonPassword" onclick="editarPassword()" type="button" value="Editar">
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center mt-5">
                        <form class="col-md-2" method="POST" action="{{ asset('/configuracion') }}">
                            @csrf
                            <div class="d-flex justify-content-center">
                                <input class="botonEditar" id="botonEliminarCuenta" onclick="eliminarCuenta()" type="button" value="Eliminar Cuenta">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection