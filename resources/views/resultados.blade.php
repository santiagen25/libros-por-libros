@extends('template')
@include('navUser')

@section('title')
    Inicio
@endsection

@section('header')

@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="enmarcarCuadrado container">
            <!--Cada div de estos es un libro-->
            @if($resultados->isEmpty())
                <h3 class="d-flex justify-content-center">No hay resultados para esta busqueda que has hecho</h3>
            @endif

            @foreach($resultados as $resultado)
                <div class="row m-4">
                    <div class="mr-4 col-md-3">
                        <img src="{{asset('images\takumi.jpg')}}" class="rounded img-fluid fotoMiniLista" alt="Foto de Perfil">
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
            @endforeach
        </div>
    </div>
@endsection