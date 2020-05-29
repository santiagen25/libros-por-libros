@extends('template')
@include('navUser')

@section('title')
    Editar Libro
@endsection

@section('header')
    
@endsection

@section('content')
<form action="{{ asset('editar-libro/'.$libro->IDLibro) }}" method="POST" enctype="multipart/form-data" class="d-flex justify-content-center">
    @csrf
    <div class="enmarcarBorde container">
        <div class="container m-4">
            <div class="row mb-4 mt-2 d-flex justify-content-center">
                <h3>
                    Editar Libro existente
                </h3>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <label class="h4">
                        Nombre:
                    </label>
                </div>
                <div class="pt-1 col-md-9 pr-5">
                <input class="inputEstandar col-md-10" name="nombre" placeholder="Nombre del libro..." type="text" value="{{$libro->Nombre}}">
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
                    <input class="inputEstandar col-md-10" name="autor" placeholder="Autor del libro..." type="text" value="{{$libro->Autor}}">
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
                    <input class="inputEstandar col-md-10" name="isbn" placeholder="ISBN..." type="text" value="{{$libro->ISBN}}">
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
                    <input class="inputEstandar col-md-10" name="genero" placeholder="Genero..." type="text" value="{{$libro->Genero}}">
                    {!! $errors->first('genero','<div class="text-danger">:message</div>') !!}
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3">
                    <label class="h4">
                        Imagen:
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
                    <textarea class="form-control col-md-12" name="descripcion" placeholder="Introduce aqui una descripción para el libro..." rows="6">{{$libro->Descripcion}}</textarea>
                    {!! $errors->first('descripcion','<div class="text-danger">:message</div>') !!}
                </div>
            </div>

            <div class="d-flex justify-content-center pr-5">
                <input class="col-md-4 botonEditar py-1" name="editarLibro" type="submit" value="Editar Libro">
            </div>

            <div class="d-flex justify-content-center pr-5 pt-3">
                <input class="col-md-4 botonEditar py-1" name="eliminarImagen" type="submit" value="Eliminar Imagen del Libro">
            </div>

            <div class="d-flex justify-content-center pr-5 pt-3">
                <input class="col-md-4 botonEditar py-1" id="eliminarLibro" onclick="eliminarLibroA()" type="button" value="Eliminar Libro">
            </div>

            {!! $errors->first('bien','<div class="text-success d-flex justify-content-center h3">:message</div>') !!}
        </div>
    </div>
</form>
@endsection