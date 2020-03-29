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
                                <img src="{{asset('images\libroPortadaDefault.png')}}" class="rounded img-fluid" alt="Portada del libro">
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