@extends('template')
@include('navUser')

@section('title')
    Listado de Usuarios
@endsection

@section('header')

@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="enmarcarCuadrado container">
            <h3 class="d-flex justify-content-center">Listado de Usuarios Registrados</h3>

            @foreach($usuarios as $usuario)
                <div class="enmarcarNoticia row">
                    <div class="row m-4 col-md-12">
                        <div class="mr-4 col-md-2">
                            <img src="{{asset('images\default-profile.png')}}" class="rounded img-fluid" alt="Foto de perfil">
                        </div>

                        <div class="col-md-9">
                            <div class="row mb-4 mt-2">
                                <div class="col-md-4">
                                    <label class="h4">
                                        Nombre:
                                    </label>
                                </div>
                                <div class="pt-1 col-md-6">
                                    <p>
                                        {{$usuario->Nombre}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <input class="botonEditar" id="botonNombreLista" onclick="editarNombreLista()" type="button" value="Editar">
                                </div>
                            </div>
        
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="h4">
                                        Email:
                                    </label>
                                </div>
                                <div class="pt-1 col-md-6">
                                    <p>
                                        {{$usuario->Email}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <input class="botonEditar" id="botonEmailLista" onclick="editarEmailLista()" type="button" value="Editar">
                                </div>
                            </div>
        
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="h4">
                                        Nacimiento:
                                    </label>
                                </div>
                                <div class="pt-1 col-md-6">
                                    <p>
                                        {{$usuario->Nacimiento}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <input class="botonEditar" id="botonNacimientoLista" onclick="editarNacimientoLista()" type="button" value="Editar">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="h4">
                                        Es administrador:
                                    </label>
                                </div>
                                <div class="pt-1 col-md-6">
                                    <p>
                                        @if($usuario->esAdmin==1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <input class="botonEditar" id="botonAdminLista" onclick="editarAdminLista()" type="button" value="Editar">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="h4">
                                        Está bloqueado:
                                    </label>
                                </div>
                                <div class="pt-1 col-md-6">
                                    <p>
                                        @if($usuario->Bloqueado==1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <input class="botonEditar" id="botonBloqueadoLista" onclick="editarBloqueadoLista()" type="button" value="Editar">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="h4">
                                        ID Usuario:
                                    </label>
                                </div>
                                <div class="pt-1 col-md-8">
                                    <p>
                                        {{$usuario->IDUsuario}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection