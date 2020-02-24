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
                    <img src="{{asset('images\default-profile.png')}}" class="rounded img-fluid" alt="Foto de Perfil">
                </div>

                <div class="col-md-8">
                    <div class="row mb-4 mt-2">
                        <div class="col-md-5">
                            <label class="h4">
                                Nombre de usuario:
                            </label>
                        </div>
                        <div class="pt-1 col-md-5">
                            <p>
                                {{$usuario->Nombre}}
                            </p>
                        </div>
                        <div class="col-md-2">
                            <input class="inputEditar" type="button" value="Editar">
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
                            <input class="inputEditar" type="button" value="Editar">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-5">
                            <label class="h4">
                                Fecha de nacimiento:
                            </label>
                        </div>
                        <div class="pt-1 col-md-5">
                            <p>
                                @if($usuario->Nacimiento==null)
                                    N/A
                                @else
                                    {{$usuario->Nacimiento}}
                                @endif
                            </p>
                        </div>
                        <div class="col-md-2">
                            <input class="inputEditar" type="button" value="Editar">
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
                            <input class="inputEditar" type="button" value="Editar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection