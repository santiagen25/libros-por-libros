@extends('template')
@include('navUser')

@section('title')
    Mis Libros
@endsection

@section('header')

@endsection

@section('content')
    <div class="d-flex justify-content-center">
        @if($libros->isEmpty())
            <div class="enmarcarCuadrado container py-2 my-5">
                <div class="enmarcarNoticia row py-3">
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 my-auto">
                        <h4>Aún no tienes ningún Libro en tu Biblioteca ¡Puedes Empezar Marcando como "Quiero Leerlo" un libro!</h4>
                    </div>
                </div>
            </div>
        @else
            <div class="enmarcarCuadrado container">
                @foreach($libros as $libro)
                    <div class="enmarcarNoticia row">
                        <div class="row m-4 col-md-12">
                            <div class="mr-4 col-md-2">
                                <a href="{{ asset('/libro/'.$libro->IDLibro) }}">
                                    @php
                                        if(file_exists('images/imagenesLibros/libro_'.$libro->IDLibro.".jpg")) echo "<img src=\"".asset('images/imagenesLibros/libro_'.$libro->IDLibro.'.jpg')."\" class=\"rounded img-fluid fotoPortadaMini\" alt=\"Foto de Portada\">";
                                        else if(file_exists('images/imagenesLibros/libro_'.$libro->IDLibro.".jpeg")) echo "<img src=\"".asset('images/imagenesLibros/libro_'.$libro->IDLibro.'.jpeg')."\" class=\"rounded img-fluid fotoPortadaMini\" alt=\"Foto de Portada\">";
                                        else if(file_exists('images/imagenesLibros/libro_'.$libro->IDLibro.".png")) echo "<img src=\"".asset('images/imagenesLibros/libro_'.$libro->IDLibro.'.png')."\" class=\"rounded img-fluid fotoPortadaMini\" alt=\"Foto de Portada\">";
                                        else if(file_exists('images/imagenesLibros/libro_'.$libro->IDLibro.".gif")) echo "<img src=\"".asset('images/imagenesLibros/libro_'.$libro->IDLibro.'.gif')."\" class=\"rounded img-fluid fotoPortadaMini\" alt=\"Foto de Poratada\">";
                                        else echo "<img src=\"".asset('images/imagenesLibros/libroPortadaDefault.png')."\" class=\"rounded img-fluid fotoPortadaMini\" alt=\"Foto de Perfil\">";
                                    @endphp
                                </a>
                            </div>

                            <div class="col-md-8">
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="h4">
                                            Nombre:
                                        </label>
                                    </div>
                                    <div class="pt-1 col-md-8">
                                        <a class="link3" href="{{ asset('/libro/'.$libro->IDLibro) }}">
                                            {{$libro->Nombre}}
                                        </a>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="h4">
                                            Autor:
                                        </label>
                                    </div>
                                    <div class="pt-1 col-md-8">
                                        <p>
                                            {{$libro->Autor}}
                                        </p>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="h4">
                                            ISBN:
                                        </label>
                                    </div>
                                    <div class="pt-1 col-md-8">
                                        <p>
                                            {{$libro->ISBN}}
                                        </p>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <label class="h4">
                                            Relacion:
                                        <label>
                                    </div>
                                    <div class="pt-1 col-md-8">
                                        <p>
                                            <!--1=quiero leerlo; 2=leyendo; 3=leido-->
                                            @if($libro->Relacion==1)
                                                Quiero Leerlo
                                            @elseif($libro->Relacion==2)
                                                Leyendo
                                            @else
                                                Leido
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-1">
                                @if($libro->Favorito==1)
                                    <span class="material-icons my-5 py-5">
                                        grade
                                    </span>
                                @else
                                    <span class="material-icons-outlined my-5 py-5">
                                        grade
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection