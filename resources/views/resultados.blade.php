@extends('template')
@include('navUser')

@section('title')
    Resultados: {{ $busqueda }}
@endsection

@section('header')

@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="enmarcarCuadrado container">
            @if($resultados->isEmpty())
                <h3 class="d-flex justify-content-center">No hay resultados para esta busqueda que has hecho</h3>
            @endif

            @foreach($resultados as $resultado)
                <div class="enmarcarNoticia row">
                    <div class="row m-4 col-md-12">
                        <div class="mr-4 col-md-3">
                            <a href="{{ asset('/libro/'.$resultado->IDLibro) }}">
                                {{-- <img src="{{asset('images\libroPortadaDefault.png')}}" class="rounded img-fluid" alt="Portada del libro"> --}}
                                @php
                                    if(session_status() == PHP_SESSION_NONE) session_start();
                                    if(file_exists('images/imagenesLibros/libro_'.$resultado->IDLibro.".jpg")) echo "<img src=\"".asset('images/imagenesLibros/libro_'.$resultado->IDLibro.'.jpg')."\" class=\"rounded img-fluid fotoPortadaMini\" alt=\"Foto de Portada\" style=\"height:200px;max-width:500px;width: expression(this.width > 500 ? 500: true);\">";
                                    else if(file_exists('images/imagenesLibros/libro_'.$resultado->IDLibro.".jpeg")) echo "<img src=\"".asset('images/imagenesLibros/libro_'.$resultado->IDLibro.'.jpeg')."\" class=\"rounded img-fluid\" alt=\"Foto de Portada\">";
                                    else if(file_exists('images/imagenesLibros/libro_'.$resultado->IDLibro.".png")) echo "<img src=\"".asset('images/imagenesLibros/libro_'.$resultado->IDLibro.'.png')."\" class=\"rounded img-fluid\" alt=\"Foto de Portada\">";
                                    else if(file_exists('images/imagenesLibros/libro_'.$resultado->IDLibro.".gif")) echo "<img src=\"".asset('images/imagenesLibros/libro_'.$resultado->IDLibro.'.gif')."\" class=\"rounded img-fluid\" alt=\"Foto de Poratada\">";
                                    else echo "<img src=\"".asset('images/imagenesLibros/libroPortadaDefault.png')."\" class=\"rounded img-fluid fotoPortadaMini\" alt=\"Foto de Perfil\">";
                                @endphp
                            </a>
                        </div>
        
                        <div class="col-md-8">
                            <div class="row mb-4 mt-2">
                                <div class="col-md-4">
                                    <label class="h4">
                                        Nombre:
                                    </label>
                                </div>
                                <div class="pt-1 col-md-8">
                                    <p>
                                        {{$resultado->Nombre}}
                                    </p>
                                </div>
                            </div>
        
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="h4">
                                        Autor:
                                    </label>
                                </div>
                                <div class="pt-1 col-md-8">
                                    <p>
                                        {{$resultado->Autor}}
                                    </p>
                                </div>
                            </div>
        
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="h4">
                                        ISBN:
                                    </label>
                                </div>
                                <div class="pt-1 col-md-8">
                                    <p>
                                        {{$resultado->ISBN}}
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