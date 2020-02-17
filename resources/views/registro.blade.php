@extends('template')

@section('title')
    Login
@endsection

@section('header')
    
@endsection

@section('content')
<form action="{{ route('registro') }}" method="POST">
    @csrf
        <div class="d-flex justify-content-center">
            <div class="enmarcarBorde col-md-3">
                <div class="m-5">
                    <div class="d-flex justify-content-center mb-2">
                        <h3>Registro</h3>
                    </div>
                    <div class="mb-4">
                        <div class="mb-2">
                            <div class="d-flex justify-content-center">
                                <p>Email</p>
                            </div>
                            <div class="d-flex justify-content-center" {{ $errors->has('email') ? 'has-error' : ''}}>
                                <input class="inputEstandar col-md-12" type="text" placeholder="Email..." name="email" value="{{ old('email') }}">
                            </div>
                            <div>
                                {!! $errors->first('email','<div class"invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="d-flex justify-content-center">
                                <p>Nombre Completo</p>
                            </div>
                            <div class="d-flex justify-content-center" {{ $errors->has('nombre') ? 'has-error' : ''}}>
                                <input class="inputEstandar col-md-12" type="text" placeholder="Nombre Completo..." name="nombre" value="{{ old('nombre') }}">
                            </div>
                            <div>
                                {!! $errors->first('nombre','<div class"invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div>
                            <div class="d-flex justify-content-center">
                                <p>Contraseña</p>
                            </div>
                            <div class="d-flex justify-content-center" {{ $errors->has('password') ? 'has-error' : ''}}>
                                <input class="inputEstandar col-md-12" type="password" placeholder="Contraseña..." name="password">
                                {!! $errors->first('password','<span class"help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="d-flex justify-content-center">
                                <p>Fecha de nacimiento</p>
                            </div>
                            <div class="d-flex justify-content-center" {{ $errors->has('nacimiento') ? 'has-error' : ''}}>
                                <input class="inputEstandar col-md-12" type="text" placeholder="Fecha de nacimiento..." name="nacimiento" value="{{ old('nacimiento') }}">
                            </div>
                            <div>
                                {!! $errors->first('nacimiento','<div class"invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-center">
                            <input class="botonEstandar py-1 m-2 col-md-9" href="inicio" name="entrar" type="submit" value="Entrar">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a class="link2" href="{{asset('login')}}">¿Ya tienes cuenta?</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection