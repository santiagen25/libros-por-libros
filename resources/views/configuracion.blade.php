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
                    <div style="background: url(images/takumi.jpg) 50% 50% no-repeat;" class="fotoEditar">
                    </div>
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
                                Santiago Torrabadella Ferrer
                            </p>
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
                                santiago.torrabadella@hotmail.com
                            </p>
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
                                2/6/1997
                            </p>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection