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
                    <img src="images/takumi.jpg" class="rounded img-fluid fotoEditar" alt="Foto de Perfil">
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
                                Cumbres Borrascosas
                            </p>
                        </div>
                        <div class="col-md-2">
                            <input class="inputEditar" type="button" value="Editar">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-5">
                            <label class="h4">
                                Autor:
                            </label>
                        </div>
                        <div class="pt-1 col-md-5">
                            <p>
                                Emily Bronte
                            </p>
                        </div>
                        <div class="col-md-2">
                            <input class="inputEditar" type="button" value="Editar">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-5">
                            <label class="h4">
                                ISBN:
                            </label>
                        </div>
                        <div class="pt-1 col-md-5">
                            <p>
                                {{$numeroDeLibros}}
                            </p>
                        </div>
                        <div class="col-md-2">
                            <input class="inputEditar" type="button" value="Editar">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <label class="h4">
                                
                            </label>
                        </div>
                        <div class="pt-1 col-md-5">
                            <p>
                                
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