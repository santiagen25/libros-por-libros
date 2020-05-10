@extends('template')
@include('navUser')

@section('title')
    Subir Libro
@endsection

@section('header')
    
@endsection

@section('content')
<form action="{{ asset('nuevo-libro') }}" method="POST" enctype="multipart/form-data" class="d-flex justify-content-center">
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
                    <input class="inputEstandar col-md-10" name="nombre" placeholder="Nombre del libro..." type="text" value="{!! $errors->first('nombreCampo',':message') !!}">
                    {!! $errors->first('nombre','<div class="text-danger">:message</div>') !!}
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <label class="h4">
                        Autor:
                    </label>
                </div>
                <div class="pt-1 col-md-9 pr-5">
                    <input class="inputEstandar col-md-10" name="autor" placeholder="Autor del libro..." type="text" value="{!! $errors->first('autorCampo',':message') !!}">
                    {!! $errors->first('autor','<div class="text-danger">:message</div>') !!}
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <label class="h4">
                        ISBN:
                    </label>
                </div>
                <div class="pt-1 col-md-9 pr-5">
                    <input class="inputEstandar col-md-10" name="isbn" placeholder="ISBN..." type="text" value="{!! $errors->first('isbnCampo',':message') !!}">
                    {!! $errors->first('isbn','<div class="text-danger">:message</div>') !!}
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <label class="h4">
                        Género:
                    </label>
                </div>
                <div class="pt-1 col-md-9 pr-5">
                    <input class="inputEstandar col-md-10" name="genero" placeholder="Genero..." type="text" value="{!! $errors->first('generoCampo',':message') !!}">
                    {!! $errors->first('genero','<div class="text-danger">:message</div>') !!}
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <label class="h4">
                        Imagen:*
                    </label>
                </div>
                <div class="row mb-4 ml-3 col-md-8">
                    <div class="col-md-12">
                        <input type="file" class="form-control-file" name="imagen">
                    </div>
                    {!! $errors->first('imagen','<div class="text-danger">:message</div>') !!}
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <label class="h4">
                        Descripcion:
                    </label>
                </div>
                <div class="pt-1 col-md-9 pr-5">
                    <textarea class="col-md-12 form-control" name="descripcion" placeholder="Introduce aqui una descripción para el libro..." rows="6">{!! $errors->first('descripcionCampo',':message') !!}</textarea>
                    {!! $errors->first('descripcion','<div class="text-danger">:message</div>') !!}
                </div>
            </div>

            <div class="d-flex justify-content-center pr-5">
                <input class="col-md-4 botonEditar py-1" name="crearLibro" type="submit" value="Crear Libro">
            </div>
            <div class="d-flex flex-row-reverse pr-5">
                <p>
                    * No es un campo obligatorio
                </p>
            </div>
            {!! $errors->first('bien','<div class="text-success d-flex justify-content-center h3">:message</div>') !!}
        </div>
    </div>
</form>
@endsection