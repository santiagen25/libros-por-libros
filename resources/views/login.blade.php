@extends('template')

@section('title')
    Login
@endsection

@section('header')
    
@endsection

@section('content')
    <div>
        <form class="d-flex justify-content-center">
            <div class="enmarcarBorde col-md-3">
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
                                <input class="inputEstandar col-md-12" type="text" placeholder="Email...">
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-center">
                                <p>Contraseña</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <input class="inputEstandar col-md-12" type="password" placeholder="Contraseña...">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-center">
                            <div>
                                <input class="checkboxEstandar form-control mx-2" id="recordarUsuario" type="checkbox">
                            </div>
                            <div class="m-2 ml-3">
                                <label style="cursor:pointer;" for="recordarUsuario">Recordarme</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input class="botonEstandar py-1 m-2 col-md-9" type="submit" value="Entrar">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a class="link2" href="crearCuenta.html">¿No tienes cuenta?</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection