@extends('template')
@include('navUser')

@section('title')
    Crear Usuario
@endsection

@section('header')
    
@endsection

@section('content')
<form action="{{ asset('creacion-usuario') }}" method="POST">
    @csrf
        <div class="d-flex justify-content-center">
            <div class="enmarcarBorde col-md-8 col-lg-6 col-xl-4">
                <div class="m-5">
                    <div class="d-flex justify-content-center mb-2">
                        <h3>Registro de un nuevo Usuario</h3>
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

                        <div class="mb-2">
                            <div class="d-flex justify-content-center">
                                <p>Nombre Completo</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <input class="inputEstandar col-md-12" type="text" placeholder="Nombre Completo..." name="nombre" value="{!! $errors->first('nombreCampo',':message') !!}">
                            </div>
                            {!! $errors->first('nombre','<div class="text-danger">:message</div>') !!}
                        </div>

                        <div>
                            <div class="d-flex justify-content-center">
                                <p>Contraseña</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <input class="inputEstandar col-md-12" type="password" placeholder="Contraseña..." name="password">
                            </div>
                            {!! $errors->first('password','<div class="text-danger">:message</div>') !!}
                        </div>

                        <div>
                            <div class="d-flex justify-content-center">
                                <p>Repetir Contraseña</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <input class="inputEstandar col-md-12" type="password" placeholder="Repite la contraseña..." name="repetirPassword">
                            </div>
                            {!! $errors->first('repetirPassword','<div class="text-danger">:message</div>') !!}
                        </div>

                        <div class="mb-2">
                            <div class="d-flex justify-content-center">
                                <p>Fecha de nacimiento</p>
                            </div>
                            <div class="d-flex justify-content-center" {{ $errors->has('nacimiento') ? 'has-error' : ''}}>
                                <input class="inputEstandar col-md-12" type="date" placeholder="Fecha de nacimiento..." name="nacimiento" value="{!! $errors->first('nacimientoCampo',':message') !!}">
                            </div>
                            {!! $errors->first('nacimiento','<div class="text-danger">:message</div>') !!}
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-center">
                            <input class="botonEstandar py-1 m-2 col-md-9" name="registrarse" type="submit" value="Registrar Usuario">
                        </div>
                    </div>
                </div>
                {!! $errors->first('registroBien','<div class="text-success d-flex justify-content-center h3">:message</div>') !!}
            </div>
        </div>
    </form>
@endsection