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
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('images\default-profile.png')}}" class="rounded img-fluid" alt="Foto de Perfil">
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <input class="botonEditar" type="button" value="Editar">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row mb-4 mt-2">
                        <div class="col-md-5">
                            <label class="h4">
                                Nombre:
                            </label>
                        </div>
                        <div class="pt-1 col-md-5">
                            <p>
                                {{$usuario->Nombre}}
                            </p>
                        </div>
                        <div class="col-md-2">
                            <input class="botonEditar" type="button" value="Editar">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-5">
                            <label class="h4">
                                Email:
                            </label>
                        </div>
                        <div class="pt-1 col-md-5">
                            <p>
                                {{$usuario->Email}}
                            </p>
                        </div>
                        <div class="col-md-2">
                            <input class="botonEditar" type="button" value="Editar">
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
                                    {{$usuario->Nacimiento}}
                                @endif
                            </p>
                        </div>
                        <div class="col-md-2">
                            <input class="botonEditar" id="botonEditar" onclick="editarNacimiento()" type="button" value="Editar">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <label class="h4">
                                Contraseña
                            </label>
                        </div>
                        <div class="pt-1 col-md-5">
                            <p>
                                ********
                            </p>
                        </div>
                        <div class="col-md-2">
                            <input class="botonEditar" type="button" value="Editar">
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center mt-5">
                        <form class="col-md-2" method="POST" action="{{ asset('/configuracion') }}">
                            @csrf
                            <div class="d-flex justify-content-center">
                                <input class="botonEditar" id="eliminarCuenta" onclick="eliminarCuenta()" type="button" value="Eliminar Cuenta">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection