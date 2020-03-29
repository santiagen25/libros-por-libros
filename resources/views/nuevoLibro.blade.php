@extends('template')
@include('navUser')

@section('title')
    Subir Libro
@endsection

@section('header')
    
@endsection

@section('content')
<form action="{{ asset('nuevo-libro') }}" method="POST" class="d-flex justify-content-center">
    @csrf
    <div class="enmarcarBorde container">
        <div class="container m-4">
            <div class="row mb-4 mt-2 d-flex justify-content-center">
                <h3>
                    Crear Nuevo Libro
                </h3>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <label class="h4">
                        Nombre:
                    </label>
                </div>
                <div class="pt-1 col-md-9 pr-5">
                    <input class="inputEstandar col-md-10" placeholder="Nombre del libro..." type="text">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <label class="h4">
                        Autor:
                    </label>
                </div>
                <div class="pt-1 col-md-9 pr-5">
                    <input class="inputEstandar col-md-10" placeholder="Autor del libro..." type="text">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <label class="h4">
                        ISBN:
                    </label>
                </div>
                <div class="pt-1 col-md-9 pr-5">
                    <input class="inputEstandar col-md-10" placeholder="ISBN..." type="text">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <label class="h4">
                        Género:
                    </label>
                </div>
                <div class="pt-1 col-md-9 pr-5">
                    <input class="inputEstandar col-md-10" placeholder="Genero..." type="text">
                </div>
            </div>

            <div class="row mb-4">
                <input type="file" class="form-control-file" name="imagen">
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <label class="h4">
                        Descripcion:
                    </label>
                </div>
                <div class="pt-1 col-md-9 pr-5">
                    <textarea class="col-md-12" placeholder="Introduce aqui una descripción para el libro..." rows="6"></textarea>
                </div>
            </div>

            <div class="d-flex justify-content-center pr-5">
                <input class="col-md-4 botonEditar py-1" type="submit" value="Crear Libro">
            </div>
        </div>
    </div>
</form>
@endsection