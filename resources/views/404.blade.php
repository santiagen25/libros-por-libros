@extends('templateBlank')

@section('title')
    No encontrado
@endsection

@section('header')

@endsection

@section('content')
    <div class="container" style="display:block; margin: 7% auto 0;">
        <div class="row d-flex justify-content-center">
            <h1 class="h1">
                Error 404: No hemos podido encontrar lo que buscabas
            </h1>
        </div>
        <div class="row d-flex justify-content-center">
            <a class="h1 mt-5" href="{{asset('inicio')}}">
                Volver a Libros por Libros
            </a>
        </div>
    </div>
@endsection