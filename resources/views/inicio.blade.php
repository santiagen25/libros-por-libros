@extends('template')
@include('navUser')

@section('title')
    Inicio
@endsection

@section('header')

@endsection

@section('content')
    <div class="d-flex justify-content-center">
        @if($valoraciones->isEmpty() && $likesDados->isEmpty())
            <div>
                <div class="enmarcarCuadrado container py-2 my-5">
                    <div class="enmarcarNoticia row py-3">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 my-auto">
                            <h4>Aún no has interactuado con la web ¡Puedes Empezar Valorando un libro!</h4>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="enmarcarCuadrado container">
                @foreach ($relaciones as $relacion)
                    <div class="enmarcarNoticia row py-3">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 my-auto">
                            @if($relacion->Relacion==1)
                                <h4>Has marcado el Libro <a href="{{asset('/libro/'.$relacion->IDLibroFK2)}}">{{$relacion->Nombre}}</a> como "Quiero Leerlo".</h4>
                            @elseif($relacion->Relacion==2)
                                <h4>Has marcado el Libro <a href="{{asset('/libro/'.$relacion->IDLibroFK2)}}">{{$relacion->Nombre}}</a> como "Leyendo".</h4>
                            @elseif($relacion->Relacion==3)
                                <h4>Has marcado el Libro <a href="{{asset('/libro/'.$relacion->IDLibroFK2)}}">{{$relacion->Nombre}}</a> como "Leido".</h4>
                            @endif
                            @if($relacion->Favorito==1)
                                <h4>Y lo has marcado como favorito.</h4>
                            @else

                            @endif
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                            <div class="row my-auto">
                                <p>
                                    @php
                                        echo explode(" ", $relacion->created_at)[0]
                                    @endphp
                                </p>
                            </div>
                            <div class="row my-auto">
                                <p>
                                    @php
                                        echo explode(" ", $relacion->created_at)[1]
                                    @endphp
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($valoraciones as $valoracion)
                    <div class="enmarcarNoticia row py-3">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 my-auto">
                            @php
                                $libro = DB::table('Libro')->where('IDLibro','=',$valoracion->IDLibroFK)->first();
                            @endphp
                            <h4>Has Valorado el Libro <a href="{{asset('/libro/'.$libro->IDLibro)}}">{{$libro->Nombre}}</a></h4>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                            <div class="row my-auto">
                                <p>
                                    @php
                                        echo explode(" ", $valoracion->created_at)[0]
                                    @endphp
                                </p>
                            </div>
                            <div class="row my-auto">
                                <p>
                                    @php
                                        echo explode(" ", $valoracion->created_at)[1]
                                    @endphp
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($likesRecibidos as $like)
                    <div class="enmarcarNoticia row py-3">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 my-auto">
                            @php
                                $usuario = DB::table('Usuario')->where('IDUsuario','=',$like->IDUsuarioFK4)->first();
                                $like_solo = DB::table('Usuario_Valoracion')->where('IDMezcla','=',$like->IDMezcla)->first();
                            @endphp
                            <h4>El Usuario <a href="{{asset('/usuario/'.$like->IDUsuarioFK4)}}">{{$usuario->Nombre}}</a> ha dado like a tu comentario en el libro <a href="{{asset('/libro/'.$like->IDLibroFK)}}">{{$like->Nombre}}</a></h4>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                            <div class="row my-auto">
                                <p>
                                    @php
                                        echo explode(" ", $like_solo->created_at)[0]
                                    @endphp
                                </p>
                            </div>
                            <div class="row my-auto">
                                <p>
                                    @php
                                        echo explode(" ", $like_solo->created_at)[1]
                                    @endphp
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($likesDados as $like)
                    <div class="enmarcarNoticia row py-3">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 my-auto">
                            @php
                                $usuario = DB::table('Usuario')->where('IDUsuario','=',$like->IDUsuarioFK)->first();
                                $like_solo = DB::table('Usuario_Valoracion')->where('IDMezcla','=',$like->IDMezcla)->first();
                            @endphp
                            <h4>Le has dado like al comentario del Usuario <a href="{{asset('/usuario/'.$like->IDUsuarioFK)}}">{{$usuario->Nombre}}</a> en el libro <a href="{{asset('/libro/'.$like->IDLibro)}}">{{$like->Nombre}}</a></h4>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                            <div class="row my-auto">
                                <p>
                                    @php
                                        echo explode(" ", $like_solo->created_at)[0]
                                    @endphp
                                </p>
                            </div>
                            <div class="row my-auto">
                                <p>
                                    @php
                                        echo explode(" ", $like_solo->created_at)[1]
                                    @endphp
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection