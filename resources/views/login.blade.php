@extends('template')

@section('title')
    Login
@endsection

@section('header')
    
@endsection

@section('content')
<form action="{{ asset('login') }}" method="POST">
    @csrf
        <div class="d-flex justify-content-center">
            <div class="enmarcarBorde col-md-8 col-lg-6 col-xl-4">
                <div class="m-5">
                    <div class="d-flex justify-content-center mb-2">
                        <h3>Login</h3>
                    </div>
                    <div class="mb-4">
                        <div class="mb-2">
                            <div class="d-flex justify-content-center">
                                <p>Email</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <input class="inputEstandar col-md-12" type="text" placeholder="Email..." name="email" value="{!! $errors->first('emailCampo',':message') !!}">
                            </div>
                            {!! $errors->first('email','<div class="text-danger">:message</div>') !!}
                        </div>
                        <div>
                            <div class="d-flex justify-content-center">
                                <p>Contraseña</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <input class="inputEstandar col-md-12" type="password" placeholder="Contraseña..." name="password">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            </div>
                        </div>
                    </div>
                    <div>
                        
                        <div class="d-flex justify-content-center">
                            <input class="botonEstandar py-1 m-2 col-md-9" href="inicio" name="entrar" type="submit" value="Entrar">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a class="link2" href="{{asset('registro')}}">¿No tienes cuenta?</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a class="link2" href="{{asset('newPassword')}}">¿Has olvidado tu contraseña?</a>
                    </div>
                </div>
                {!! $errors->first('block','<div class="text-danger d-flex justify-content-center h3">:message</div>') !!}
            </div>
        </div>
    </form>
@endsection