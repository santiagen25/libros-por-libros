@extends('template')
@include('navUser')

@section('title')
    {{ $usuario->Nombre }}
@endsection

@section('header')

@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="enmarcarCuadrado container">
            <div class="row m-4">
                <div class="mr-4 col-md-3">
                    {{-- <img src="{{asset('images\default-profile.png')}}" class="rounded img-fluid" alt="Foto de Perfil"> --}}
                    @php
                        if(file_exists('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.".jpg")) echo "<img src=\"".asset('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.'.jpg')."\" class=\"rounded img-fluid\" alt=\"Foto de Perfil\" id=\"fotoPerfil\">";
                        else if(file_exists('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.".jpeg")) echo "<img src=\"".asset('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.'.jpeg')."\" class=\"rounded img-fluid\" alt=\"Foto de Perfil\" id=\"fotoPerfil\">";
                        else if(file_exists('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.".png")) echo "<img src=\"".asset('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.'.png')."\" class=\"rounded img-fluid\" alt=\"Foto de Perfil\" id=\"fotoPerfil\">";
                        else if(file_exists('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.".gif")) echo "<img src=\"".asset('images/imagenesUsuarios/foto_'.$usuario->IDUsuario.'.gif')."\" class=\"rounded img-fluid\" alt=\"Foto de Perfil\" id=\"fotoPerfil\">";
                        else echo "<img src=\"".asset('images/imagenesUsuarios/default-profile.png')."\" class=\"rounded img-fluid\" alt=\"Foto de Perfil\" id=\"fotoPerfil\">";
                    @endphp
                </div>

                <div class="col-md-8">
                    <div class="row mb-4 mt-2">
                        <div class="col-md-6">
                            <label class="h4">
                                Nombre:
                            </label>
                        </div>
                        <div class="pt-1 col-md-6">
                            <p>
                                {{$usuario->Nombre}}
                            </p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="h4">
                                Email:
                            </label>
                        </div>
                        <div class="pt-1 col-md-6">
                            <p>
                                {{$usuario->Email}}
                            </p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="h4">
                                Fecha de nacimiento:
                            </label>
                        </div>
                        <div class="pt-1 col-md-6">
                            <p>
                                @php
                                    echo explode(" ", $usuario->Nacimiento)[0]
                                @endphp
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection