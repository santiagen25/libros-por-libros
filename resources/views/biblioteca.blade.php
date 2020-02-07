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
        <div class="row m-4">
                <div class="mr-4 col-md-3">
                    <img src="{{asset('images\cumbres_borrascosas_portada.jpg')}}" class="rounded img-fluid fotoMiniLista" alt="Foto de Perfil">
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
                                Cumbres Borrascosas
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
                                Emily Bronte
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
                                X
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection