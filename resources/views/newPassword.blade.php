@extends('template')

@section('title')
    Recuperar Contraseña
@endsection

@section('header')
    
@endsection

@section('content')
<form action="{{ asset('newPassword') }}" method="POST">
    @csrf
        <div class="d-flex justify-content-center">
            <div class="enmarcarBorde col-md-3">
                <div class="m-5">
                    <div class="d-flex justify-content-center mb-2">
                        <h3>Recuperar Contraseña</h3>
                    </div>
                    <div class="mb-4">
                        <div class="mb-2 d-flex justify-content-center">
                            <div class="">
                                <p>Si has olvidado tu contraseña introduce tu mail para que te podamos mandar una nueva</p>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-center">
                                <p>Email</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <input class="inputEstandar col-md-12" type="texto" placeholder="Email..." name="email">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <input class="botonEstandar py-1 m-2 col-md-9" name="entrar" type="submit" value="Enviar">
                    </div>
                    <div class="d-flex justify-content-center">
                        <a class="link2" href="{{asset('registro')}}">¿No tienes cuenta?</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a class="link2" href="{{asset('login')}}">¿Ya recuerdas tu contraseña?</a>
                    </div>
                </div>
                {!! $errors->first('mal','<div class="text-danger d-flex justify-content-center h3">:message</div>') !!}
                {!! $errors->first('bien','<div class="text-success d-flex justify-content-center h3">:message</div>') !!}
            </div>
        </div>
    </form>
@endsection