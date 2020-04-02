@extends('template')
@include('navUser')

@section('title')
    Inicio
@endsection

@section('header')

@endsection

@section('content')
    <div class="d-flex justify-content-center">
        @if($valoraciones->isEmpty() && $likes->isEmpty())
            <div>
                <div class="enmarcarCuadrado container">
                    <div class="enmarcarNoticia row">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 my-auto">
                            <h4>Aún no has interactuado con la web ¡Puedes Empezar Valorando un libro!</h4>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="enmarcarCuadrado container">
                @foreach ($valoraciones as $valoracion)
                    <div class="enmarcarNoticia row">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 my-auto">
                            @php
                                $libro = DB::table('Libro')->where('IDLibro','=',$valoracion->IDLibroFK)->first();
                            @endphp
                            <h4>Has Valorado el Libro <a href="{{asset('/libro/'.$libro->IDLibro)}}">{{$libro->Nombre}}</a></h4>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                            <div class="row my-auto">
                                <p>{{$valoracion->created_at}}</p>
                            </div>
                            <div class="row my-auto">
                                <p>likes</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($likesRecibidos as $like)
                    <div class="enmarcarNoticia row">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 my-auto">
                            @php
                                $libro = DB::table('Libro')->where('IDLibro','=',$like->IDUsuarioFK4)->first();
                                $usuario = DB::table('Usuario')->where('IDUsuario','=',$like->IDUsuarioFK4)->first();
                            @endphp
                            <h4>El Usuario <a href="{{asset('/usuario/'.$like->IDUsuarioFK4)}}">{{$usuario->Nombre}}</a> ha dado like a tu comentario en el libro <a href="{{asset('/libro/'.$libro->IDLibro)}}">{{$libro->Nombre}}</a></h4>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                            <div class="row my-auto">
                                <p>{{$valoracion->created_at}}</p>
                            </div>
                            <div class="row my-auto">
                                <p>likes</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!--Lukes son los likes, pero que has dado, no los que te han dado-->
                @foreach ($likesDados as $like)
                    <div class="enmarcarNoticia row">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 my-auto">
                            @php
                                $libro = DB::table('Libro')->where('IDLibro','=',$like->IDUsuarioFK4)->first();
                                $usuario = DB::table('Usuario')->where('IDUsuario','=',$like->IDUsuarioFK4)->first();
                            @endphp
                            <h4>El Usuario <a href="{{asset('/usuario/'.$like->IDUsuarioFK4)}}">{{$usuario->Nombre}}</a> ha dado like a tu comentario en el libro <a href="{{asset('/libro/'.$libro->IDLibro)}}">{{$libro->Nombre}}</a></h4>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                            <div class="row my-auto">
                                <p>{{$valoracion->created_at}}</p>
                            </div>
                            <div class="row my-auto">
                                <p>likes</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection