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
            <h2 class="d-flex justify-content-center">Listado de Usuarios Registrados</h2>

            <form action="{{asset('listado')}}" class="form-inline my-2 my-lg-0 d-flex justify-content-center" method="GET">
                <input class="inputEstandar" name="buscador" type="search" placeholder="Buscar usuario...">
                <button class="botonEstandar form-control my-2" type="submit">Buscar</button>
            </form>

            @if($usuarios->isEmpty())
                <h3 class="d-flex justify-content-center">No hay resultados para esta busqueda que has hecho</h3>
            @endif

            {!! $errors->first('errorImagen','<div class="text-danger d-flex justify-content-center h4">:message</div>') !!}
            {!! $errors->first('successEliminar','<div class="text-success d-flex justify-content-center h4">:message</div>') !!}

            @foreach($usuarios as $usuario)
                <div class="enmarcarNoticia row">
                    <div class="row m-4 col-md-12">
                        <div class="mr-4 col-md-2">
                            <form action="/listado" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- <img src="{{asset('images\default-profile.png')}}" class="rounded img-fluid" alt="Foto de perfil"> --}}
                                <div class="row col-md-12" id="imagenPadre_{{$usuario->IDUsuario}}">
                                    @php
                                        if(file_exists('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.".jpg")) echo "<img src=\"".asset('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.'.jpg')."\" class=\"rounded img-fluid\" alt=\"Foto de Perfil\" id=\"fotoPerfil_".$usuario->IDUsuario."\">";
                                        else if(file_exists('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.".jpeg")) echo "<img src=\"".asset('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.'.jpeg')."\" class=\"rounded img-fluid\" alt=\"Foto de Perfil\" id=\"fotoPerfil_".$usuario->IDUsuario."\">";
                                        else if(file_exists('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.".png")) echo "<img src=\"".asset('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.'.png')."\" class=\"rounded img-fluid\" alt=\"Foto de Perfil\" id=\"fotoPerfil_".$usuario->IDUsuario."\">";
                                        else if(file_exists('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.".gif")) echo "<img src=\"".asset('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.'.gif')."\" class=\"rounded img-fluid\" alt=\"Foto de Perfil\" id=\"fotoPerfil_".$usuario->IDUsuario."\">";
                                        else echo "<img src=\"".asset('images/default-profile.png')."\" class=\"rounded img-fluid\" alt=\"Foto de Perfil\" id=\"fotoPerfil_".$usuario->IDUsuario."\">";
                                    @endphp
                                </div>
                                <div class="row col-md-12 d-flex justify-content-center my-4" id="botonImagenPadre_{{$usuario->IDUsuario}}">
                                    <input class="botonEditar" id="botonImagen_{{$usuario->IDUsuario}}" onclick="editarImagenLista({{$usuario->IDUsuario}})" value="Editar" type="button">
                                </div>
                                <input type="hidden" name="id" value="{{$usuario->IDUsuario}}">
                            </form>
                        </div>

                        <div class="col-md-9">
                            <div class="row mb-4 mt-2">
                                <div class="col-md-4">
                                    <label class="h4">
                                        Nombre:
                                    </label>
                                </div>
                                <div class="pt-1 col-md-6" id="nombrePadre_{{$usuario->IDUsuario}}">
                                    <p id="nombre_{{$usuario->IDUsuario}}">
                                        {{$usuario->Nombre}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <input class="botonEditar" id="botonNombre_{{$usuario->IDUsuario}}" onclick="editarNombreLista({{$usuario->IDUsuario}})" type="button" value="Editar">
                                </div>
                            </div>
        
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="h4">
                                        Email:
                                    </label>
                                </div>
                                <div class="pt-1 col-md-6" id="emailPadre_{{$usuario->IDUsuario}}">
                                    <p id="email_{{$usuario->IDUsuario}}">
                                        {{$usuario->Email}}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <input class="botonEditar" id="botonEmail_{{$usuario->IDUsuario}}" onclick="editarEmailLista({{$usuario->IDUsuario}})" type="button" value="Editar">
                                </div>
                            </div>
        
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="h4">
                                        Nacimiento:
                                    </label>
                                </div>
                                <div class="pt-1 col-md-6" id="nacimientoPadre_{{$usuario->IDUsuario}}">
                                    <p id="nacimiento_{{$usuario->IDUsuario}}">
                                        @php
                                            echo explode(" ", $usuario->Nacimiento)[0]
                                        @endphp
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <input class="botonEditar" id="botonNacimiento_{{$usuario->IDUsuario}}" onclick="editarNacimientoLista({{$usuario->IDUsuario}})" type="button" value="Editar">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="h4">
                                        Es administrador:
                                    </label>
                                </div>
                                <div class="pt-1 col-md-6">
                                    <p id="isAdmin_{{$usuario->IDUsuario}}">
                                        @if($usuario->esAdmin==1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <input class="botonEditar" onclick="editarAdminLista({{$usuario->IDUsuario}})" type="button" value="Editar">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="h4">
                                        Está bloqueado:
                                    </label>
                                </div>
                                <div class="pt-1 col-md-6">
                                    <p id="isBlock_{{$usuario->IDUsuario}}">
                                        @if($usuario->Bloqueado==1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <input class="botonEditar" onclick="editarBloqueadoLista({{$usuario->IDUsuario}})" type="button" value="Editar">
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

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="h4">
                                        Contraseña:
                                    </label>
                                </div>
                                <div class="pt-1 col-md-6" id="passwordPadre_{{$usuario->IDUsuario}}">
                                    <p id="password_{{$usuario->IDUsuario}}">
                                        *******
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <input class="botonEditar" id="botonPassword_{{$usuario->IDUsuario}}" onclick="editarPasswordLista({{$usuario->IDUsuario}})" type="button" value="Editar">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-4 col-md-12 d-flex justify-content-center">
                        <form method="POST" action="{{ asset('/listado') }}" id="eliminarPadre_{{$usuario->IDUsuario}}">
                            @csrf
                            <input class="botonEditar" id="botonEliminarCuenta_{{$usuario->IDUsuario}}" onclick="eliminarCuentaLista({{$usuario->IDUsuario}})" type="button" value="Eliminar Cuenta">
                            <input type="hidden" name="id" value="{{$usuario->IDUsuario}}">
                        </form>
                    </div>
                </div>
            @endforeach

            <form action="{{ asset('/creacion-usuario') }}" class="d-flex justify-content-center my-5">
                <input class="botonEditar p-2 col-md-4" type="submit" value="Crear Cuenta">
            </form>
        </div>
    </div>
@endsection